<?php

namespace app\components;

use app\models\Publications;
use yii\base\Widget;

class PublicViewerWidget extends Widget
{

    public $id;
    public $fl;


    public function run()
    {
        if ($this->id != null) {
            $public = Publications::find()
                ->where(['id' => $this->id])
                ->andWhere(['status' => 1])
                ->andWhere(['news' => 0])
                ->one();

            if($this->fl==1){return $this->render('pviewer1',compact('public'));}
            if($this->fl==2){return $this->render('pviewer2',compact('public'));}
            else{return $this->render('pviewer',compact('public'));}



        }
    }
}