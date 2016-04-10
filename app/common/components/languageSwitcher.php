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

        $languageNew = Yii::$app->request->get('language');
        if($languageNew)
        {
            if(isset($this->languages[$languageNew]))
            {
                Yii::$app->session['language'] = $languageNew;
            }
        }
        if (!isset(Yii::$app->session['language'])) {
            Yii::$app->session['language'] = 'et';
        }
        Yii::$app->language = Yii::$app->session['language'];
    }
 
    public function run()
    {
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
    }

 
}