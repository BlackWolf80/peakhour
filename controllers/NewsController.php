<?php

namespace app\controllers;

use app\models\Publications;

class NewsController extends AppController
{
    public function actionIndex(){

        $publication=$this->publicgroupViewer($_GET['id']);
        $videoGroup=9;
        return $this->render('index',compact('publication','videoGroup'));
    }

}
