<?php

namespace app\controllers;

use app\models\Query;
use Yii;


class PsyController extends AppController
{
    public function actionIndex()
    {

        if(isset($_GET['id'])){
            $this->metaTags($_GET['id']);
            $publication=$this->publicgroupViewer($_GET['id']);
            return $this->render('index',compact('publication'));
        }
        else{
            $this->metaTags(1500);
            $messages=Query::find()
                ->with('answer')
                ->Where(['publicgroup'=>1500])
                ->andWhere(['status'=>1])
                ->orderBy(['id' => SORT_DESC])
                ->all();

            return $this->render('index',compact('messages'));
        }

    }


}
