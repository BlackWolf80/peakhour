<?php

namespace app\controllers;

class MeetController extends AppController
{
    public function actionIndex()
    {

        $this->metaTags(900);
        return $this->render('index');
    }

}
