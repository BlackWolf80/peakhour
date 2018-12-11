<?php

namespace app\controllers;

class AdvertiseController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(1300);

        return $this->render('index');
    }

    public function actionForm()
    {




        $this->metaTags(1300);
        return $this->render('form');
    }

}
