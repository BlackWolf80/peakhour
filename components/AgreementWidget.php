<?php

namespace app\components;

use app\models\Slider;
use app\models\Video;
use yii\base\Widget;

class AgreementWidget extends Widget{

    public $select;


    public function run()
    {


        return $this->render('agreement');
    }


}