<?php

namespace app\components;
use app\models\Banners;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

use Yii;

class BannerViewerWidget extends Widget{

    public $id;
    public $group;
    public $width;
    public $height;
    public $class;

    public function run(){

        if(isset($this->id)){
            $banner = Banners::findOne($this->id);

                $this->timeOld($banner);

        }
        elseif(isset($this->group)){

            $banners=Banners::find()->where(['group'=>$this->group])->asArray()->all();
            $id=$banners[rand ( 0 , count($banners)-1)];
            $banner = Banners::findOne($id);

            $this->timeOld($banner);
        }

    }


    public function timeOld($banner){ //проверка доступности

        if($banner->status == 1 && $banner->pay == 1){

            switch ($banner->period){
                case 0: //0 - 3
                    $timeOld = strtotime($banner->date. '+ '. 3 . ' month');
                    break;
                case 1://1 - 6
                    $timeOld = strtotime($banner->date. '+ '. 6 . ' month');
                    break;
                case 2://2 - 12
                    $timeOld = strtotime($banner->date. '+ '. 12 . ' month') ;
                    break;
                case 3://постоянно
                    $timeOld = strtotime($banner->date) ;
                    break;
            }

            if(time() < $timeOld or $banner->period == 3 ){
                return $this->vid($banner);
            }
        }

    }

    public function vid($banner){
        $img = $banner->getImage();
        echo Html::a('<span class="image_vid_min">'.
            Html::img('/images/upload/store/'.$img['filePath'],['height'=>$this->height,'width'=>$this->width]).'</span>',
            Url::to([$banner['link']]));
    }

}