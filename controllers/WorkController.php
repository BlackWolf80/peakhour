<?php

namespace app\controllers;

class WorkController extends AppController
{
    public function actionIndex()
    {
        $publication=$this->publicgroupViewer($_GET['id']);
        $videoGroup=8;
        return $this->render('index',compact('publication','videoGroup'));
    }

}
