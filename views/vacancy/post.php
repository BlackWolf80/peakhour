<?php
use app\components\BannerViewerWidget;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;
use yii\captcha\Captcha;
use mihaildev\ckeditor\CKEditor;
?>

<!-- =================== Contact us container ============== -->
<section class="contact_us_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->

                <?=BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70])?>

                <h2>Разместить вакансию</h2>
                <p>Тут вы можете бесплатно разместить вакансию,<br>для этого, пожалуйста, заполните форму.</p>
            </div> <!-- End section title -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form_holder"> <!-- form holder -->





                <?php $form = ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'vcForm','enctype' => 'multipart/form-data']]);?>
                <?php $params = ['prompt' => 'Выберите группу'];?>
                <?=$form->field($model, 'group_id')->dropDownList($items,$params);?>

                <?=$form->field($model,'vac_name');?>
                <?=$form->field($model,'price');?>
                <?=$form->field($model,'address');?>
                <?=$form->field($model,'contact_name');?>
                <?=$form->field($model,'organization');?>
                <?=$form->field($model,'phone');?>
                <?=$form->field($model,'email')->input('email');?>


                <?php
                echo $form->field($model, 'description')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>
                <table class="premium">
                    <tr><td> <span>Если поставить галочку,<br>  ваша вакансия будет высвечиваться в первых строках,<br>  но объявление становится
                                <b>платным</b><br></span>
                            <h4>Стоимость: + 100  ₽</h4></td></tr>
                    <tr>
                        <td><?=$form->field($model,'premium')->checkbox([ '0' => 'Базовый', '1' => 'Премиум','class'=>'']) ?></td>
                    </tr>

                </table>


                <div class="capcha">
                    <?=$form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]);?>
                    </div>
                <p class="spec"><span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Подтверждаю согласие с
                        <a href="#specification" class="" data-toggle="modal"><b>правилами размещения вакансий.</b></a>
                    </span>
                    <?=$form->field($model,'specification')->checkbox(['class'=>'']) ?>
                </p>

                <div class="modal fade" id="specification" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"><h4 class="modal-title" id="myModalLabel"> Правила размещения вакансий</h4></div>
                            <div class="modal-body">
                                <?=\app\components\SpecificationWidget::widget();?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>



                <?=Html::submitButton('Подтвердить', ['class'=> 'button_e']);?>

               <!-- <h4>Стоимость:

                    ₽</h4>-->
                <?php ActiveForm::end();?>

                <br>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70])?>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
                <address>
                    <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                    <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?></div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                    <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?></div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
                    <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?></div>
                </address>
            </div>
        </div>
    </div>
</section>

<!-- =================== /Contact us container ============== -->

