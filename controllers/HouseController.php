<?php

namespace app\controllers;

class HouseController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(500);

        return $this->render('index');
    }

}
