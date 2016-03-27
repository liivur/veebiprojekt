<?php
/*
http://www.yiiframework.com/extension/yii2-language-picker/
author :: Pitt Phunsanit
website :: http://plusmagi.com
change language by get language=EN, language=TH,...
or select on this widget
*/
 
namespace app\common\components;
 
use Yii;
use yii\base\Component;
use yii\base\Widget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\Cookie;
 use app\web\Session;
$session = Yii::$app->session;

class languageSwitcher extends Widget
{
    
    public $languages = [
        'en' => 'English',
        'et' => 'Eesti',
       
    ];
 
    public function init()
    {
        if(php_sapi_name() === 'cli')
        {
            return true;
        }
 
        parent::init();
 
        $cookies = Yii::$app->response->cookies;
        $languageNew = Yii::$app->request->get('language');
        if($languageNew)
        {
            if(isset($this->languages[$languageNew]))
            {
                Yii::$app->language = $languageNew;
                $cookies->add(new \yii\web\Cookie([
                    'name' => 'language',
                    'value' => $languageNew
                ]));

            }
        }
        elseif($cookies->has('language'))
        {
            Yii::$app->language = $cookies->getValue('language');
            
        }
        else{
            Yii::$app->language ='et';
        }


 
    }
 
    public function run(){
        $languages = $this->languages;
        $current = $languages[Yii::$app->language];
        unset($languages[Yii::$app->language]);
 
        $items = [];
        foreach($languages as $code => $language)
        {
            $temp = [];
            $temp['label'] = $language;
            $temp['url'] = Url::current(['language' => $code]);
            array_push($items, $temp);
        }

 
        echo ButtonDropdown::widget([
            'label' => $current,
            'dropdown' => [
                'items' => $items,
            ],
        ]);

        $languageCookie = new Cookie([
    'name' => 'language',
    'value' => $language,
    'expire' => time() + 60 * 60 * 24 * 30, 
]);
     setcookie('language', $current, time() + 60 * 60 * 24 * 30);


     $_SESSION['language'] = $current;
  /*   echo ' cookie:';
    echo $_COOKIE['language'];
echo ' session:';
    echo $_SESSION['language'] ;
    echo ' current:';
    echo $current;

     /*
     if (!isset($_COOKIE['language'])) {
        setcookie('language', $language);
    } 
    */
//    Yii::$app->response->    $cookies->getCookie('language', $language);
//Yii::$app->response->cookies->add($languageCookie);
/*$user = Yii::$app->user;
$user->language = $language;
$user->save();
*/
    }

 
}