<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="online">
<?php foreach ($group as $cam):?>
        <div class="has-post-thumbnail">

            <div class="entry-thumbnail">
                <?=Html::a(Html::img('/images/online/'.$cam['image'],['alt'=>$cam['name']]),Url::to(['/kuban/krdonline','id'=>$cam['id']]),['target'=>'_blank'])?>

            </div>
            <h3 class="entry-title">
                <?=Html::a($cam['name'],Url::to(['/kuban/krdonline','id'=>$cam['id']]),['target'=>'_blank'])?>
            </h3>
        </div>

<?php endforeach;?>

</div>