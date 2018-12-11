<?php
use app\components\BannerViewerWidget;
?>
<!-- .content -->

        <div class="fitnes">

            <div class="img-holder2">
                <img src="<?=$public['image'];?>" alt="">
            </div>
            <p><?=$public['spoiler'];?></p>

            <div class="content">
                <a href="/public?id=<?=$public['id']?>" class="read-more">Читать далее <i class="fa fa-angle-right"></i></a>
            </div><!-- /.content -->
</div>
