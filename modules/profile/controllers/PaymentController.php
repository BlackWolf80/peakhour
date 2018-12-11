<?php

namespace app\modules\profile\controllers;
use app\models\Ads;
use app\models\Banners;
use app\models\Users;
use yii\filters\AccessControl;
use yii;
use yii\web\Controller;

/**
 * Default controller for the `profile` module
 */
class PaymentController extends \app\controllers\AppController
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
        return $this->render('payment');
    }
    public function actionResult(){
        return $this->render('result');
    }
    public function actionSuccess(){
        return $this->render('success');
    }
    public function actionFail(){
        return $this->render('fail');
    }
}
