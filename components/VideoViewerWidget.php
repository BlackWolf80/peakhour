<?php

namespace app\components;
use app\models\Video;
use yii\base\Widget;

class VideoViewerWidget extends Widget{
    public  $id;

    public function run(){
        if(isset($this->id)){
            $video=Video::findOne($this->id);
            if($video->status){
                echo '<iframe  src="https://www.youtube.com/embed/'.$video->link.'" frameborder="0" allowfullscreen></iframe>';
            }
        }

    }

}