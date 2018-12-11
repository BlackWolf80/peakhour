<?php

namespace app\controllers;

class FashionController extends AppController
{
    public function actionIndex()
    {
        $publication=$this->publicgroupViewer($_GET['id']);
        return $this->render('index',compact('publication'));
    }

}
