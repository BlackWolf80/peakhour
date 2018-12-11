<?php

namespace app\components;

use app\models\CommentForm;
use app\models\Comments;
use Yii;
use yii\base\Widget;

class CommentWidget extends Widget{

    public $array;
    public $public;



    public function run()
    {

        if($this->array != null) {
            $public=$this->array;
            $feed = new CommentForm();


            if ($feed->load(Yii::$app->request->post())) {

                if ($feed->save()) {
                    Yii::$app->session->setFlash('success', 'Спасибо ваш отзыв принят.');
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка ввода');
                }
            }

            return $this->render('comment', compact('public', 'feed'));
        }
        elseif ($this->public != null){

            $comments =Comments::find()->orderBy(['date' => SORT_DESC])->where(['publication'=>$this->public])->all();

//            return $this->render('comment2', compact('comments'));

           echo '<div class="container_com"><div class="comment-box"><h5>Отзывы:</h5><div class="comment-holder"><div class="single-comment"><div class="content">';
            $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
            foreach ($comments as $comment){
                echo '<h4>'.$comment->author.'</h4>';
                echo '<p>'.$comment->text.'</p>';
                echo '<ul class="meta"><li><a class="date">';
                echo date('d ', strtotime($comment->date)).' ';
                echo $months[date('n', strtotime($comment->date))].' ';
                echo date('Y', strtotime($comment->date));
                echo '</a></li><br><br></ul>';

            }

           echo '</div></div></div></div></div>';


        }
    }


}