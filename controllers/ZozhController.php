<?php

namespace app\controllers;
use app\models\Query;
use app\models\Publications;

class ZozhController extends AppController
{
    public function actionIndex()
    {
        $publication=$this->publicgroupViewer($_GET['id']);
        $public = Publications::find()->with('comments')->where(['id'=>$_GET['id']])->one();
        return $this->render('index',compact('publication','public'));
    }

}
