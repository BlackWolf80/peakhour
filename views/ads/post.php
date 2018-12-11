<?php
use app\components\BannerViewerWidget;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;
use yii\captcha\Captcha;
use mihaildev\ckeditor\CKEditor;
\app\assets\NormalAsset::register($this);
?>
<div style="text-align:center;">
<?=BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70])?>
</div>

 <?php if(isset($_GET['message'])): ?>

     <?php if($_GET['message']==1): ?>
         <!-- =================== баннер ============== -->
         <section class="contact_us_container">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->

                         <h2>Разместить баннер</h2>
                         <!--                <p>Тут вы можете разместить ваше объявление,<br>для этого, пожалуйста, заполните форму.</p>-->
                     </div> <!-- End section title -->

                     <div class=" col-md-7 col-sm-12 col-xs-12 pull-left">

                         <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                         <table>
                             <tr>
                                 <td colspan="2">
                                     <?=$form->field($model,'name');?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <?= $form->field($model, 'image')->fileInput(); ?>
                                 </td>
                                 <td>
                                     <?=$form->field($model,'link');?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <?=$form->field($model,'contact_name');?>
                                 </td>
                                 <td>
                                     <?=$form->field($model,'organization');?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <?=$form->field($model,'email')->input('email');?>
                                 </td>
                                 <td>
                                     <?=$form->field($model,'phone');?>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                     <?=$form->field($model, 'period')->dropDownList([ '0' => '3 месяца', '1' => '6 месяцев', '2' => '12 месяцев' ]);?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>

                                     <!--<?//= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>-->
                                     Нажимая данную кнопку, я принимаю условия <?=\app\components\AgreementWidget::widget();?><br />
                                     и даю свое согласие "Час Пик" на обработку моих персональных данных,
                                     в соответствии с<br /> Федеральным законом от 27.07.2006 N 152-ФЗ<br /> "О персональных данных".
                                     <?=$form->field($model,'spec')->checkbox(['class'=>'']) ?>
                                 </td>
                                 <td>
                                     <?=Html::submitButton('Подтвердить', ['class'=> 'button_e']);?>
                                 </td>
                             </tr>
                         </table>
                         <?php ActiveForm::end();?>






                            <br /><br />
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
                         <address>
                             <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                             <div class="address_holder float_left">

                             </div>
                         </address>
                         <address class="clear_fix">
                             <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                             <div class="address_holder float_left">
                                 Стоимость Услуги:<br />
                                 3 мес. - 6900 руб.<br />
                                 6 мес. - 12900 руб.<br />
                                 12 мес. - 19900 руб.
                         </address>

                     </div>
                 </div>
             </div>
         </section>

         <!-- =================== /баннер============== -->


     <?php elseif($_GET['message']==2): ?>
         <!-- =================== простое============== -->

         <section class="contact_us_container">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->

                         <h2>Разместить объявление</h2>
                         <!--                <p>Тут вы можете разместить ваше объявление,<br>для этого, пожалуйста, заполните форму.</p>-->
                     </div> <!-- End section title -->

                     <div class=" col-md-7 col-sm-12 col-xs-12 pull-left">

                         <?php $form = ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'vcForm','enctype' => 'multipart/form-data']]);?>
                         <?php $params = ['prompt' => 'Выберите группу'];?>
                         <?=$form->field($model, 'group')->dropDownList($items,$params);?>
                         <?=$form->field($model,'type')->dropDownList([ '0' => '1 месяц', '1' => '3 месяца' ]);?>
                         <?=$form->field($model,'title');?>
                         <?=$form->field($model,'price');?>
                         <?=$form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

                         <?php

                         echo $form->field($model, 'body')->widget(CKEditor::className(),[
                             'editorOptions' => [
                                 'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                 'inline' => false, //по умолчанию false
                             ],
                         ]);

                         ?>

                         <table>
                             <tr><td colspan="2"><?=$form->field($model,'organization');?></td></tr>
                             <tr>
                                 <td><?=$form->field($model,'contact_name');?></td>
                                 <td><?=$form->field($model,'phone');?></td>
                             </tr>
                             <tr>
                                 <td><?=$form->field($model,'email');?></td>
                                 <td><?=$form->field($model,'address');?></td>
                             </tr>
                         </table>
                         <?=$form->field($model,'premium')->checkbox([ '0' => 'Базовый', '1' => 'Премиум','class'=>'']) ?>
                         <?=$form->field($model, 'verifyCode')->widget(Captcha::className(), [
                             'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14 capcha">{input}</div></div>',]);?>
                         <?=Html::submitButton('Подтвердить', ['class'=> 'button_e']);?>

                         <?php ActiveForm::end();?>
                         <br /><br />
                     </div>

                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
                         <address>
                             <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                             <div class="address_holder float_left">

                             </div>
                         </address>
                         <address class="clear_fix">
                             <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                             <div class="address_holder float_left">
                                 Стоимость:<br />
                                 1 мес. - 150 руб.<br />
                                 3 мес. - 290 руб.
                             </div>
                         </address>

                     </div>
                 </div>
             </div>
         </section>

         <!-- =================== /простое============== -->
     <?php elseif($_GET['message']==3): ?>
         <!-- =================== видео============== -->


         <!-- =================== /видео============== -->
     <?php endif;?>


 <?php else:?>
<!-- =================== select ============== -->
<section class="contact_us_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->

                <h2>Разместить объявление</h2>
<!--                <p>Тут вы можете разместить ваше объявление,<br>для этого, пожалуйста, заполните форму.</p>-->
            </div> <!-- End section title -->

                <div class=" col-md-7 col-sm-12 col-xs-12 pull-left address">
                    <address>
                        <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                        <div class="address_holder float_left">
                        <div class="button_p">
                            <a href="/ads/post?message=1">
                                <img src="/images/button.png" width="530"><span>Заявка на размещение баннера</span>
                            </a>
                        </div>
                        </div>
                    </address>
                    <address class="clear_fix">
                        <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                        <div class="address_holder float_left">
                            <div class="button_p">
                                <a href="/ads/post?message=2">
                                    <img src="/images/button.png" width="530"><span>Обычное объявление</span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <address class="clear_fix">
                        <div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
                        <div class="address_holder float_left">
                            <div class="button_p block">
                                <a href="/ads/post?message=3">
                                    <img src="/images/button.png" width="530"><span>Видео объявление</span>
                                </a>
                            </div>
                        </div>
                    </address>
                </div>



            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
                <address>
                    <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                    <div class="address_holder float_left">
                        Стоимость:<br />
                        3 мес. - 6900 руб.<br />
                        6 мес. - 12900 руб.<br />
                        12 мес. - 19900 руб.
                    </div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                    <div class="address_holder float_left">
                        Стоимость:<br />
                        1 мес. - 150 руб.<br />
                        3 мес. - 290 руб.
                    </div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
                    <div class="address_holder float_left">
                        Стоимость:<br />
                        1 мес. - 350 руб.<br />
                        3 мес. - 900 руб.<br />
                        12 мес. - 1900 руб.
                    </div>
                </address>
            </div>
        </div>
    </div>
</section>

<!-- =================== /select ============== -->

<?php endif;?>
</div>
