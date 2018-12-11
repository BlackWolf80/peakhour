<?php

namespace app\controllers;
use app\models\Authors;
use app\models\Books;
use app\models\Query;

class BooksController extends AppController
{
    public function actionIndex()
    {
        $this->metaTags(1700);
        $authors=Authors::find()->all();
        if (isset($_GET['id'])){
            $book=Books::findOne($_GET['id']);

            if($book->file != null) {
                $filename = 'images/books/' . $book->file . '.fb2';
                $lines = file($filename);
            }
            else{$filename=null;}
            return $this->render('index',compact('lines','filename','book'));


        }
        return $this->render('index',compact('authors'));
    }

    public function actionAuthors(){

        $authors=Authors::findOne();

    }


}
