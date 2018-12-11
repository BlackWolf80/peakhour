<?php

namespace app\components;
use app\models\Request;
use Yii;;
use app\models\Callback;
use yii\base\Widget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

class FormWidget extends Widget{
    public  $id;
    public $type;

    public function run(){

       switch ($this->type){
           case 'callback':
                //форма обратного звонка
               $model= new Callback();
               if($model->load(Yii::$app->request->post())){
                   $post_array=Yii::$app->request->post();

                   if ($model->save()){
                       $admin_email= Yii::$app->params['adminEmail'];

                       $this->mailSend($admin_email,$admin_email,$post_array,'Обратный звонок от: '
                           .$post_array['Callback']['name'].' '
                           .$post_array['Callback']['phone'],'callback');
                       Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');
                   }
                   else{
                       Yii::$app->session->setFlash('error','Ошибка ввода');
                   }
               }


               $form = ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'callForm']]);
               echo $form->field($model,'name')
                   ->input('text',['value'=>'имя','onfocus'=>"this.value='';",'onblur'=>"if (this.value == '') {this.value ='имя';}"]);
               echo $form->field($model,'phone')
                   ->input('text',['value'=>'телефон','onfocus'=>"this.value='';",'onblur'=>"if (this.value == '') {this.value ='телефон';}"]);
               //echo '<div class="capcha">'.$form->field($model, 'verifyCode')->widget(Captcha::className(), [
               //        'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]).'</div>';
               echo Html::submitButton('Отправить');
               ActiveForm::end();

               break;
           case 'request':
               $model= new Request();
               if($model->load(Yii::$app->request->post())){
                   $post_array=Yii::$app->request->post();

                   if ($model->save()){
                       $admin_email= Yii::$app->params['adminEmail'];

                       $this->mailSend($admin_email,$admin_email,$post_array,'Вопрос от: '
                           .$post_array['Request']['name'].' '
                           .$post_array['Request']['phone'],'request');
                       Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');
                   }
                   else{
                       Yii::$app->session->setFlash('error','Ошибка ввода');
                   }
               }

               $form = ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'callForm']]);
               echo $form->field($model,'name')
                   ->input('text',['value'=>'имя','onfocus'=>"this.value='';",'onblur'=>"if (this.value == '') {this.value ='имя';}"]);
               echo $form->field($model,'phone')
                   ->input('text',['value'=>'телефон','onfocus'=>"this.value='';",'onblur'=>"if (this.value == '') {this.value ='телефон';}"]);
               echo $form->field($model,'message')
                   ->textarea(['value'=>'сообщение','onfocus'=>"this.value='';",'onblur'=>"if (this.value == '') {this.value ='сообщение';}"]);
               echo '<div class="capcha">'.$form->field($model, 'verifyCode')->widget(Captcha::className(), [
                       'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]).'</div>';
               echo Html::submitButton('Отправить');
               ActiveForm::end();

               break;
           default:
               echo 'неверный тип формы';
               break;
       }




    }

    public function mailSend($emFrom,$emTo,$model,$subject,$layoutMessage){

        Yii::$app->mailer->compose ($layoutMessage, ['model' => $model])
            ->setFrom ([$emFrom => 'Сервис обратной связи Technograni']) //от кого
            ->setTo ($emTo)                                          //кому
            ->setSubject ($subject)                                  //заголовок
            ->send ();
    }
}