<?php

namespace app\components;

use app\controllers\AppController;
use app\models\Publications;
use app\models\Publicgroup;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class PublicWidget extends Widget
{

    public $id;
    public $array; //список публикаций раздела
    public $public_group;
    public $publicId;
    public $arrayPublicList; //вывод содержимого статей


    public function run()
    {
        if($this->public_group != null){

            $points=Publicgroup::find()->where(['parent_id'=>$this->public_group])->all();
            foreach ($points as $item) {
                echo '<li>'.Html::a('<i class="fa fa-angle-right"></i>&nbsp;'.$item['name'],Url::to([$item['address']])).'</li>';
            }

        }
        elseif ($this->arrayPublicList !=null){
            $publication=Publications::find()
                ->where(['group'=>$this->arrayPublicList])
                ->andWhere(['status'=>1])
                ->with('comments')
                ->orderBy(['id' => SORT_DESC])
                ->asArray()
                ->all();

            return $this->render('publication',compact('publication'));

        }
        elseif ($this->publicId !=null){
            $publication=Publications::find()
                ->where(['id'=>$this->publicId])
                ->andWhere(['status'=>1])
                ->with('comments')
                ->asArray()
                ->all();
            return $this->render('publication',compact('publication'));
        }
        else{

            if ($this->id != null) {
                $public = Publications::find()
                    ->where(['group' => $this->id])
                    ->andWhere(['status' => 1])
                    ->asArray()->all();
            } elseif ($this->array != null) {
                $public = $this->array;
            }


            foreach ($public as $item) {
                echo '<li>'.Html::a('<i class="fa fa-angle-right"></i>&nbsp;'.$item['title'],Url::to(['/public','id'=>$item['id']])).'</li>';
            }

        }



    }



}