<?php

namespace app\controllers;

use app\models\Publications;

class FamilyController extends AppController
{
    public function actionIndex(){

        switch ($_GET['id']){
            case 403:
                $videoGroup = 4; $randomGroup = 3;
                break;
        }



        $publication=$this->publicgroupViewer($_GET['id']);
        return $this->render('index',compact('publication','videoGroup','randomGroup'));
    }

    public function actionRelax(){

        $publication=Publications::find()->where(['group'=>402])->andWhere(['status'=>1])->asArray()->all();

        $this->metaTags(402);
        return $this->render('relax', compact('publication'));
    }

}
