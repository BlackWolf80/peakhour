<?php

namespace app\controllers;

use app\assets\NormalAsset;
use Yii;
use app\models\Feedback;

class FeedbackController extends AppController
{
    public function actionIndex()
    {
//        NormalAsset::register($this->getView());

        $feed = new Feedback();

        if($feed->load(Yii::$app->request->post()) && $feed->feedback(Yii::$app->params['adminEmail'])){

            if ($feed->save()){
                Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');

                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка ввода');
            }
        }


        $this->view->title = "Час пик | Обратная связь";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'обратная связь']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Час пик обратная связь']);

        return $this->render('index',compact('feed'));
    }

}
