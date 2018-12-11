<?php

namespace app\components;

use app\models\CommentForm;
use Yii;
use yii\base\Widget;

class SpecificationWidget extends Widget{




    public function run()
    {
        return $this->render('specification');
    }
}