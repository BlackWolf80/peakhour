<?php

namespace app\components;

use yii\base\Widget;
use Yii;

class MailVacantionWidget extends Widget{

    public $id;


    public function run()
    {
        $model=\app\models\Vacantion::findOne($this->id);
        $admin_email= Yii::$app->params['adminEmail'];
        Yii::$app->mailer->compose ('vacant', ['vc' => $model])
            ->setFrom ([$admin_email=>'Сервис обратной связи Час-Пик'])
            ->setTo ($admin_email)
            ->setSubject ('Запрос на размещение вакансии '.$model->vac_name)
            ->send ();
    }
}