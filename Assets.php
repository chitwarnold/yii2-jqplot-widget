<?php

namespace vakorovin\yii2_jqplot_widget;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@vakorovin/yii2_jqplot_widget/jquery.jqplot';

    public $js = [
        'jquery.jqplot.js',
    ];

    public $css = [
        'jquery.jqplot.css',
    ];

	public $depends = [
		'yii\web\YiiAsset',
	];
}
