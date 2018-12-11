<?php

namespace app\components;


use app\models\Video;
use yii\base\Widget;

class ToTopWidget extends Widget{




    public function run()
    {

            return $this->render('totop');

    }



}