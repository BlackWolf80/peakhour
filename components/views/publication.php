
<?php
use yii\helpers\Html;
/*
    foreach ($publication as $public){

                  echo '<div class="single-blog-post anim-5-all">';
                  echo '<div class="img-holder">';
                  echo  Html::img($public['image']);
                  echo  '<div class="overlay">'.Html::a('<i class="fa fa-link"></i>',['/site/public','id'=>$public['id']]).'</div>';
                  echo '     </div>';

                  echo '     <div class="post-meta">';
                  echo '         <div class="date-holder">';
                  echo '             <span>';
                  echo date('d', strtotime($public['date']));
                  echo '             </span>';

                  $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
                  echo $months[date('n', strtotime($public['date']))];
                  echo '</div>';
                  echo '          <div class="title-holder">';
                  echo '             <h2 class="title">'.$public['title'];
                  echo '             <ul>';
                  echo '                 <li>'.Html::a('автор:'.$public['author']).'</li>';
                  echo '                 <li>'.Html::a('Комментариев: 0').'</li>';
                  echo '             </ul>';
                  echo '         </div>';
                  echo '     </div>';
                  echo '     <div class="content">';
                  echo '         <p>'.$public['spoiler'].'</p>';
                  echo  Html::a('Читать далее <i class="fa fa-angle-right"></i>',['/site/public','id'=>$public['id']],['class'=>'read-more']);


        echo      '</div></div>';
                }

*/

?>

<?php foreach ($publication as $public):?>

    <!-- .single-blog-post -->
    <div class="single-blog-post anim-5-all">
        <!-- .img-holder -->
        <div class="img-holder">
            <?=Html::img($public['image']);;?>
            <div class="overlay"><?=Html::a('<i class="fa fa-link"></i>',['/site/public','id'=>$public['id']])?></div>
        </div><!-- /.img-holder -->
        <!-- .post-meta -->
        <div class="post-meta">
            <div class="date-holder">
                                <span>
                                <?php echo date('d', strtotime($public['date']));?>
                                </span>

                <?php
                $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
                echo $months[date('n', strtotime($public['date']))];
                ?>

            </div>
            <div class="title-holder">
                <h2 class="title"><?=$public['title'];?></h2>
                <ul>
                    <li><?=Html::a('автор:'.$public['author'])?></li>
                    <li><?=Html::a('Комментариев: '.count($public['comments']))?></li>

                </ul>
            </div>
        </div><!-- /.post-meta -->
        <!-- .content -->
        <div class="content">
            <p><?=$public['spoiler'];?></p>
            <?=Html::a('Читать далее <i class="fa fa-angle-right"></i>',['/site/public','id'=>$public['id']],['class'=>'read-more']);?>
        </div><!-- /.content -->
    </div>
<?php endforeach;?>