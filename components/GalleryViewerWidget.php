<?php

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Galery;
use Yii;

class GalleryViewerWidget extends Widget{

    public $id;
    public $public;


    public function run(){

        $galery = Galery::find()->where(['publication'=>$this->public])->asArray()->all();

     foreach ($galery as $image){

/*         <a href="<?=$image['image']?>" class="flipLightBox">*/
/*                        <img class="img-hold" src="<?=$image['image']?>" alt="<?=$image['name']?>" height="500" />*/
//                        <span data-href="06-create-groups-demo.html" data-target="_blank"></span>
//                    </a>

                    echo '<span class="image_vid_min">';
                    echo Html::a(
                        Html::img($image['image'],['class'=>'img-hold ','alt'=>$image['image'],'height'=>'500']).
                        '<span data-href="06-create-groups-demo.html" data-target="_blank"></span>',
                        $image['image'],['class'=>'flipLightBox']).'</span>';
     }
    }

}