<?php

namespace app\components;
use app\models\Imagerand;
use yii\base\Widget;
use yii\helpers\Html;



class RandomSliderWidget extends Widget{


    public $group; //если группу


    public function run(){

        $slides=Imagerand::find()->where(['group'=>$this->group])->asArray()->all();
        $slide=$slides[rand ( 0 , count($slides)-1)]['image'];

            echo Html::a(
                Html::img($slide,['alt'=>$slide,'width'=>'100%', 'height'=>'80%']).
                '<span data-href="06-create-groups-demo.html" data-target="_blank"></span>',
                $slide,
                ['class'=>'flipLightBox']);
    }



}