<?php



namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TagsInputAsset extends AssetBundle
{
    public $basePath = '@webroot/tagsinput';
    public $baseUrl = '@web/tagsinput';
    public $css = [
        'tagsinput.js'
    ];

    public $js = [
        'tagsinput.js'
    ];


    public $depends = [
        JqueryAsset::class
    ];
}
