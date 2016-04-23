<?php
//got help from yii2 cookbook for languagecontroller

namespace app\controllers;

use Yii;
use app\common\classes\CurlHandler;
use app\models\ContactForm;
use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'vote', 'profile'],
                'rules' => [
                    [
                        'actions' => ['logout', 'vote', 'profile'],
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
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionVote()
    {
        return $this->render('vote');
    }

    public function actionStatistics()
    {
        return $this->render('statistics');
    }

    public function actionCandidates()
    {
        return $this->render('candidates');
    }

    public function actionSearch()
    {
        return $this->render('search-results');
    }

    public function actionMessage()
    {
        return $this->render('index');
    }

    public function actionLongPoll()
    {
        set_time_limit(0);

        $data_source_file = Yii::getAlias('@runtime/data.txt');
        if (!file_exists($data_source_file)) {
            fclose(fopen($data_source_file, 'w'));
        }

        while (true) {
            
            $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;
           
            clearstatcache();
            $last_change_in_data_file = filemtime($data_source_file);
            
            if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {
                
                $data = file_get_contents($data_source_file);
              
                $result = array(
                    'data_from_file' => $data,
                    'timestamp' => $last_change_in_data_file
                );
                
                $json = json_encode($result);
                echo $json;
                
                break;
            } else {
                
                sleep( 1 );
                continue;
            } 
        }
    }
}