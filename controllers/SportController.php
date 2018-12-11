<?php

namespace app\controllers;

class SportController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(1100);
        return $this->render('index');
    }

}
