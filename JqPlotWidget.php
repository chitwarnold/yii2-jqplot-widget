<?php

/**
 * Yii2 jqPlot Widget
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

	private $_id;

    public function init()
    {
		parent::init();

		if (!empty($this->htmlOptions['id'])){
			$this->setId($this->htmlOptions['id']);
		} else $this->getId();

		$this->htmlOptions['id']=$this->getId();
    }

    public function run()
    {

        echo Html::tag("div", "", $this->htmlOptions);

		Assets::register($this->getView());

		$data=Json::encode($this->data);
		$jqplotOptions=Json::encode($this->jqplotOptions);

		$JavaScript = "jQuery('#".$this->getId()."').jqplot({$data}, {$jqplotOptions});\n";

		$this->getView()->registerJs($JavaScript, View::POS_END);

    }

}
