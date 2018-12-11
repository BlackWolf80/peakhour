<?php

namespace app\components;
use app\models\Video;
use yii\base\Widget;
use yii\helpers\Html;

class VideoFourWidget extends Widget{


    public function run()
    {
        $videoArray= Video::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(6)
            ->all();
        echo '<div class="gallery">';
        foreach ($videoArray as $video){
            echo Html::a('<img src="'.$video['image'].'" width="62" height="62"/>',['/video','id'=>$video['id']]);
        }
        echo '</div>';
    }



}