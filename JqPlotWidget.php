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
use yii\helpers\Json;

class JqPlotWidget extends Widget
{

    public static $autoIdPrefix = 'jq';

	public $data=[];

	public $htmlOptions=[];

	public $jqplotOptions=[];

    public function init()
    {
		parent::init();

		if (!empty($this->htmlOptions['id'])){
			$this->setId($this->htmlOptions['id']);
		}

		$this->htmlOptions['id']=$this->id;
    }

    public function run()
    {

		Assets::register($this->getView());

		$data="[";

		if (empty($this->data)){
			$data="[]";
		} else {
			$graphs=[];
			foreach ($this->data as $_graph){
				$graph=[];
				foreach ($_graph as $x=>$y){
					$graph[]="[{$x}, {$y}]";
				}
				$graphs[]="[".implode(",", $graph)."]";
			}
			$data="[".implode(",", $graphs)."]";
		}

		$data=Json::encode($this->data);
		$jqplotOptions=Json::encode($this->jqplotOptions);

		$JavaScript = "jQuery('#".$this->id;
		$JavaScript .= "').jqplot({$data}, {$jqplotOptions});";

        echo Html::tag("div", "", $this->htmlOptions);

		$this->getView()->registerJs($JavaScript, View::POS_END);

    }



}
