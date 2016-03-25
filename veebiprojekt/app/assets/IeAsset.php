<?php
namespace app\assets;

use yii\web\AssetBundle;

class IeAsset extends AssetBundle 
{
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
        'condition' => 'lt IE9'
    ];
    public $js = [
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
    ];
} 