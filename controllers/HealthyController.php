<?php

namespace app\controllers;

class HealthyController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(300);
        return $this->render('index');
    }

}
