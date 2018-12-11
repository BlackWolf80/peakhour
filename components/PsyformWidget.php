<?php

namespace app\components;

use Yii;
use app\models\Psych;
use yii\base\Widget;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\web\Controller;

class PsyformWidget extends Widget{


    public function run()
    {

        $psych= new Psych();

        if($psych->load(Yii::$app->request->post())){

            if ($psych->save()){
                Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');
                //сообщение для психолога на почту
                $admin_email= Yii::$app->params['adminEmail'];

                Yii::$app->mailer->compose ('psiholog', ['psych' => $psych])
                    ->setFrom ([$admin_email=>'Сервис обратной связи Час-Пик'])
                    ->setTo ($admin_email)
                    ->setSubject ('Сообщение от '.$psych->name.' для психолога')
                    ->send ();

            }
            else{
                Yii::$app->session->setFlash('error','Ошибка ввода');
            }
        }
        $this->render('psyform',compact('psych'));
    }

}