<?php

namespace app\components;

use app\models\Slider;
use yii\base\Widget;

class SliderWidget extends Widget{

    public $select;


    public function run()
    {
            $slides=Slider::find()
                ->where(['select'=>$this->select])
                ->andWhere(['status'=>1])
                ->asArray()
                ->all();

        return $this->render('slider', compact('slides'));
    }


}