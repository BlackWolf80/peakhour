<?php

namespace app\controllers;

class KubanController extends AppController
{
    public function actionIndex()
    {
        $publication=$this->publicgroupViewer($_GET['id']);
        $videoGroup=6;
        return $this->render('index',compact('publication','videoGroup'));
    }

    public function actionKrdonline(){




        return $this->render('online');
    }
}
