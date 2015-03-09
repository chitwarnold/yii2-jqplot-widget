<?php

/**
 * Yii2 MAC-address Validator
 * 
 * @link https://github.com/vakorovin/yii2-jqplot-widget
 * @license https://github.com/vakorovin/yii2-jqplot-widget/blob/master/LICENSE MIT
 * @author Vladimir Korovin <rolan1986@gmail.com>
 * @see http://www.jqplot.com
 */

namespace vakorovin\yii2_jqplot_widget;


use yii\helpers\Html;
use yii\web\View;
use yii\base\Widget;

class JqPlotWidget extends Widget
{

    public static $autoIdPrefix = 'jq';

	public $data=[];

	public $options=[];

	public $jqplotOptions=[];

/*
 * 
 * 
 *     public static function tag($name, $content = '', $options = [])
    {
        $html = "<$name" . static::renderTagAttributes($options) . '>';
        return isset(static::$voidElements[strtolower($name)]) ? $html : "$html$content</$name>";
    }

//*/

    public function run()
    {

		$jqplotOptions="";
		if (!empty($this->jqplotOptions)){
			$jqplotOptions.="{\n";
			foreach ((array) $this->jqplotOptions as $param=>$value){
				$jqplotOptions.="  {$param}: '{$value}',\n";
			}
			$jqplotOptions.="}\n";
		}

		$JavaScript = "jQuery('#".$this->id;
		$JavaScript .= "').jqplot({$options});";

		$this->getView()->registerJs($JavaScript, View::POS_END);


    }

}
