<?php

namespace app\controllers;

use Yii;
use app\common\classes\CurlHandler;
use app\common\classes\UrlObject;
use app\common\exceptions\CurlException;
use app\models\LoginForm;
use app\models\activerecord\Credentials;
use app\models\activerecord\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class FacebookController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'link'],
                'rules' => [
                    [
                        'actions' => ['link'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $data = Yii::$app->request->get();
        if (isset($data['error'])) {
            $model = new LoginForm();
            return $this->render('//site/login', [
                'model' => $model,
            ]);
        }

        if (isset($data['code'])) {
            $curlHandler = new CurlHandler();
            $urlObject = new UrlObject("https://graph.facebook.com/v2.3/oauth/access_token", [
                'client_id' => Yii::$app->params['appId'],
                'redirect_uri' => Url::to(['facebook/login'], true),
                'client_secret' => Yii::$app->params['appSecret'],
                'code' => $data['code']
            ]);

            try {
                $response = json_decode($curlHandler->sendRequest($urlObject));
                $urlObject = new UrlObject("https://graph.facebook.com/debug_token", [
                    'input_token' => $response->access_token,
                    'access_token' => Yii::$app->params['appId'].'|'.Yii::$app->params['appSecret']
                ]);
                try {
                    $userData = json_decode($curlHandler->sendRequest($urlObject))->data;
                    if ($userData->is_valid && $userData->app_id == Yii::$app->params['appId']) {
                        $user = Users::findIdentityByAccessToken($userData->user_id, Credentials::FACEBOOK);
                        if ($user) {
                            Yii::$app->user->login($user);
                            return $this->goBack();
                        }
                        Yii::$app->session->setFlash('noSuchUser');
                    }
                } catch (CurlException $e) {
                    Yii::$app->session->setFlash('unknownError');
                }
            } catch (CurlException $e) {
                Yii::$app->session->setFlash('unknownError');
            }
        }

        $model = new LoginForm();
        return $this->render('//site/login', [
            'model' => $model,
        ]);
    }

    public function actionDestroylink()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        Credentials::deleteAll(['type' => Credentials::FACEBOOK, 'user_id' => Yii::$app->user->id]);
        return \yii\helpers\Json::encode(Yii::$app->user);
    }

    public function actionLink()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $data = Yii::$app->request->get();
        if (isset($data['error'])) {
            return $this->render('//site/profile');
        }

        if (isset($data['code'])) {
            $curlHandler = new CurlHandler();
            $urlObject = new UrlObject("https://graph.facebook.com/v2.3/oauth/access_token", [
                'client_id' => Yii::$app->params['appId'],
                'redirect_uri' => Url::to(['facebook/link'], true),
                'client_secret' => Yii::$app->params['appSecret'],
                'code' => $data['code']
            ]);

            try {
                $response = json_decode($curlHandler->sendRequest($urlObject));
                $urlObject = new UrlObject("https://graph.facebook.com/debug_token", [
                    'input_token' => $response->access_token,
                    'access_token' => Yii::$app->params['appId'].'|'.Yii::$app->params['appSecret']
                ]);
                try {
                    $userData = json_decode($curlHandler->sendRequest($urlObject))->data;
                    if ($userData->is_valid && $userData->app_id == Yii::$app->params['appId']) {
                        $credential = Credentials::find()->where(['user_id' => Yii::$app->user->id, 'type' => Credentials::FACEBOOK])->one();
                        if (!$credential) {
                            $credential = new Credentials;
                            $credential->user_id = Yii::$app->user->id;
                            $credential->type = Credentials::FACEBOOK;
                            $credential->token = $userData->user_id;
                            if ($credential->save()) {
                                Yii::$app->session->setFlash('linkSuccess');
                            } else {
                                Yii::$app->session->setFlash('linkError');
                            }
                        }
                    }
                } catch (CurlException $e) {
                    Yii::$app->session->setFlash('unknownError');
                }
            } catch (CurlException $e) {
                Yii::$app->session->setFlash('unknownError');
            }
        }

        return $this->render('//site/profile');
    }
}