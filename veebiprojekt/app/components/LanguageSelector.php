<?php
namespace app\components;
use app\base\BootstrapInterface;




class LanguageSelector implements BootstrapInterface 
{
    public $supportedLanguages = [];

    public function run(){
        $currentLanguage= \Yii::$app->language;
        $Languages= \Yii::$app->params['languages'];
        return $this->render('LanguageSelector', array('currentLanguage'=>$currentLanguage, 'languages'=>$languages));


    }

    public function bootstrap($app)
    {
        
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : null;
        // or in case of database:
        // $preferredLanguage = $app->user->language;

        if (empty($preferredLanguage)) {
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }

        $app->language = $preferredLanguage;
    }
}