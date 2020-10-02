<?php


namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class VoiceAsset extends AssetBundle
{
    public $basePath = '@webroot/voice';
    public $baseUrl = '@web/voice';

    public $js = [
        'app.js',
        'https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}