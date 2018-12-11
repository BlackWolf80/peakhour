<?php
\app\assets\NormalAsset::register($this);
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<!-- ======= Banner ======= -->
<section class="p0 container-fluid banner about_banner">
    <div class="about_banner_opacity">
        <div class="container">
            <div class="banner_info_about">
                <h1><?= Html::encode($this->title) ?></h1>

            </div> <!-- End Banner Info -->
        </div> <!-- End Container -->
    </div> <!-- End Banner_opacity -->
</section> <!-- End Banner -->
<!-- ================= /Banner ================ -->

<!-- =================== 404 container========== -->
<section class="error_page_container">
    <div class="container">
        <div class="row">
            <h3><span><?= nl2br(Html::encode($message)) ?></span></h3><br />

            Администрация сайта Час Пик приносит свои извинения<br />
            Обратитесь в службу поддержки  <a href="mailto:ask@htmlbook.ru">chas-pik023@yandex.ru</a><br />
            Или сообщите о проблеме в <a href="/feedback">форме обратной связи</a><br />


        </div>
    </div>
</section>
<!-- =================== /404 container========== -->