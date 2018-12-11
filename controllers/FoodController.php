<?php

namespace app\controllers;

class FoodController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(700);

        return $this->render('index');
    }

}
