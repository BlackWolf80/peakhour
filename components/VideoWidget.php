<?php

namespace app\components;
use app\models\Video;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class VideoWidget extends Widget{

    public $imgFlag; //если картинки
    public $id; //если одно
    public $group; //если группу


    public function run()
    {
        if($this->imgFlag == null){
            if($this->id != null){
                $videoArray= Video::find()->where(['id'=>$this->id])->one();
            }
            elseif ($this->group != null){
                $videoArray= Video::find()->where(['group_id'=>$this->group])->all();
            }
            return $this->render('video',compact('videoArray'));
        }
        else{
            if($this->id != null){
                $videoArray= Video::find()->where(['id'=>$this->id])->one();
            }
            elseif ($this->group != null){
                $videoArray= Video::find()->where(['group_id'=>$this->group])->all();
            }
            $i=0;
            foreach ($videoArray as $video){
                echo'<div class="image_vid">';
                echo '<span> '.$video['name'].'</span><br>';
//                echo '<a href="/video?id='.$video['id'].'">';
//                echo '<img src="'.$video['image'].'" width="240" height="160"/></a>';
                echo Html::a(Html::img($video['image']),['/video','id'=>$video['id']]);
                echo '</div>';$i++;
                if($i % 2 == 0){echo '<div class="clearfix"></div>';}
            }
        }
    }
}