pviewer.php<?php
use app\components\BannerViewerWidget;
?>
<!-- .content -->
<div class="content2">

    <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h2><?=$public['title'];?></h2>
            <div class="img-holder2">
                <img src="<?=$public['image'];?>" alt="">
            </div>
            <p><?=$public['spoiler'];?></p>
            <p><?=$public['body'];?></p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <p><?=$public['body2'];?></p>
        </div>
    </div>

    <?php if($public['body2'] != null):?>

        <ul class="nav nav-pills nav-justified">
            <li class="active"><a  data-toggle="pill" href="#menu1">Страница 1</a></li>
            <li ><a  data-toggle="pill" href="#menu2">Страница 2</a></li>
        </ul>
    <?php endif;?>

    <p><?=$public['author'];?></p>
</div><!-- /.content -->
