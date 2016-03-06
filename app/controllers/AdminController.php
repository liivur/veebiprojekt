<?php

namespace app\controllers;

use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\activerecord\Areas;
use app\models\activerecord\Parties;
use app\models\activerecord\Users;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UnauthorizedHttpException;

class AdminController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->identity->is_admin) {
                return true;
            }
            throw new UnauthorizedHttpException('Pole piisavalt õigus', 401);
        }
        return false;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdduser()
    {
        if (Yii::$app->request->isPost) {
            $errors = [];
            $user = new Users;
            $user->load(Yii::$app->request->post());
            $user->setPassword($user->password);
            if (!$user->save()) {
                $errors = $user->getErrors();
            }
            if (Yii::$app->request->isAjax) {
                if (count($errors)) {
                    Yii::$app->response->statusCode = 400;
                }
                return \yii\helpers\Json::encode($errors);
            }
            return $this->render('index', [
                'errors' => $errors,
                'success' => !count($errors),
            ]);
        }
    }

    public function actionAddparty()
    {
        if (Yii::$app->request->isPost) {
            $errors = [];
            $party = new Parties;
            $party->load(Yii::$app->request->post());
            if (!$party->save()) {
                $errors = $party->getErrors();
            }
            if (Yii::$app->request->isAjax) {
                if (count($errors)) {
                    Yii::$app->response->statusCode = 400;
                }
                return \yii\helpers\Json::encode($errors);
            }
            return $this->render('index', [
                'errors' => $errors,
                'success' => !count($errors),
            ]);
        }
    }

    public function actionAddarea()
    {
        if (Yii::$app->request->isPost) {
            $errors = [];
            $area = new Areas;
            $area->load(Yii::$app->request->post());
            if (!$area->save()) {
                $errors = $area->getErrors();
            }
            if (Yii::$app->request->isAjax) {
                if (count($errors)) {
                    Yii::$app->response->statusCode = 400;
                }
                return \yii\helpers\Json::encode($errors);
            }
            return $this->render('index', [
                'errors' => $errors,
                'success' => !count($errors),
            ]);
        }
    }
}
