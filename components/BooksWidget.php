<?php

namespace app\components;

use app\models\Authors;
use app\models\Books;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class BooksWidget extends Widget
{
    public $aut;
    public $author;
    public $section;
    public $type;


    public function run()
    {
        if(isset($this->type)){
            switch ($this->type){
                case 1:
                    //список авторы
                    $authors= Authors::find()->with('books')->orderBy(['name'=>SORT_ASC])->all();
                    foreach ($authors as $author){
                        echo '<li>'.Html::a('<i class="fa fa-angle-right"></i>&nbsp;'.
                                $author['name'],Url::to(['/books','author'=>$author['id']])).'</li>';}

                     break;
                case 2:
                    //все книги
                    $books=Books::find()->all();
                    $this->booksList($books,'130');
                    break;
                case 3:
                    //книги по разделам сайта
                    $books=Books::find()->where->all();
                    $this->booksList($books,'130');
                    break;
            }


        }elseif (isset($this->author)){
            //книги автора
            $books=Books::find()->where(['author'=>$this->author])->all();
            $author=Authors::findOne($this->author);
            echo '<h4>'.$author->name.'</h4><br />';
            echo mb_substr( $author->description, 0, 460). '...  <i>'.
                Html::a('Подробнее <i class="fa fa-angle-right"></i>',['/books','aut'=>$this->author],['class'=>'read-more']).'</i>';
            echo'<div class="clearfix"></div>';
            $this->booksList($books,'130');
        }
        elseif (isset($this->aut)){
            $author=Authors::findOne($this->aut);
            echo '<h4>'.$author->name.'</h4><br />';
            echo  $author->description.'<br />';
            echo '<p><a class="fa fa-arrow-circle-left read-more" href="" onclick="javascript:history.back(); return false;"> Назад</a></p>';

        }
        elseif (isset($this->section)){
            $books=Books::find()->where(['section'=>$this->section])->all();
            $this->booksList($books,'130');
        }

    }

    public function booksList($books,$size){
        foreach ($books as $book){
            echo Html::a(
                '<div class="books_list">'.Html::img($book->img,['width'=>$size]).'<br /><span>'.$book->name.'</span></div>'
                ,['/books','id'=>$book->id]);
        }
    }

}