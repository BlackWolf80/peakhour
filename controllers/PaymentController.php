<?php

namespace app\controllers;

class PaymentController extends AppController
{
    public function actionIndex(){
        return $this->render('payment');
    }
    public function actionResult(){
        return $this->render('result');
    }
    public function actionSuccess(){$this->layout='@app/views/layouts/main2';
        return $this->render('success');
    }
    public function actionFail(){
        return $this->render('fail');
    }
}
