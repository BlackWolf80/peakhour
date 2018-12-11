<?php

namespace app\controllers;
use app\models\Query;

class OrthodoxController extends AppController
{
    public function actionIndex()
    {  //новости
        if(isset($_GET['id'])){
            $publication=$this->publicgroupViewer($_GET['id']);
            return $this->render('index',compact('publication'));
        }

        return $this->render('index');



    }

    public function actionVideo(){

        $this->metaTags(201);
        return $this->render('video');
    }

    public function actionAnswer(){
        $this->view->title = "Час пик | вопросы к батюшке";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Час пик вопросы психологу']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Час пик вопросы психологу']);

        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {
            $messages=Query::find()
                ->with('answer')
                ->Where(['id'=>$_GET['id']])
                ->all();
        }
        else{
            $messages=Query::find()
                ->with('answer')
                ->Where(['publicgroup'=>202])
                ->orderBy(['title' => SORT_ASC])
//            ->orderBy(['id' => SORT_DESC])
                ->all();
        }
        return $this->render('answer',compact('messages'));
    }

    public function actionBooks(){

                $this->metaTags(206);

        return $this->render('books');
    }
}
