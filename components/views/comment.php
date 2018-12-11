
<?php
use yii\widgets\ActiveForm;;
use yii\captcha\Captcha;
use yii\helpers\Html;
$public_id='';
$months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
?>

<div class="container_com">
    <div class="comment-box">
        <h5>Отзывы:</h5>
        <!-- .comment-holder -->
        <div class="comment-holder">


            <div class="single-comment">
                <div class="content">
                    <?php foreach ($public['comments'] as $comment):?>
                        <?php if ($comment->status == 1):?>
                            <!-- .single-comment -->

                            <h4><?php $public_id =$comment['publication'];  echo $comment->author?></h4>
                            <p><?php echo $comment->text?></p>
                            <ul class="meta">
                                <li><a class="date">
                                        <?php echo $months[date('n', strtotime($comment->date))];?>
                                        <?php echo date('d Y', strtotime($public->date));?>
                                    </a></li><br><br>
                            </ul>

                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div><!-- /.single-comment -->
        </div><!-- /.comment-holder -->
    </div>
    <!-- .comment-form -->
    <div class="comment-1">
        <h4>Оставьте  свой отзыв</h4>

        <?php $form = ActiveForm::begin(['options'=>["class" => "form-vertical",'id' => 'callForm']]) ?>
        <?=$form->field($feed,'author') ?>
        <?=$form->field($feed,'text')->textarea(['rows'=>5]) ?>
        <?=$form->field($feed,'publication')->input('text',['value'=>$public_id,'disabled' => 'disabled','type'=>'hidden']) ?>
        <?= $form->field($feed, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]) ?>
        <?=Html::submitButton('Отправить', ['class'=> 'add_call'])?>
        <?php ActiveForm::end() ?>
    </div><!-- /.comment-form -->
</div>

