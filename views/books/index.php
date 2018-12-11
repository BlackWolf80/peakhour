<?php
\app\assets\NormalAsset::register($this);
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\BooksWidget;
?>

<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">
                <div class="books">

                    <?php
                    if (isset($_GET['id'])){
                        echo '<h2>'.$book->name.'</h2> - '.$book->author0->name;
                        echo '<br />'.Html::img($book->img).'<br />';
                        echo '<h4>Описание:</h4><br />';
                        echo $book->description;

                        echo 'Скачать книгу:<br />';

                        if($book->audio!=null){echo Html::a('аудио<br />',$book->audio,['target'=>'_blank']);}


                        if (isset($lines)){
                            echo Html::a('fb2<br /> ',$filename);
                            $flag=0;
                            foreach($lines as $line){

                                if(strpos($line,'<title>')){$flag=1;}
                                elseif (strpos($line,'</title>')){$flag=0; }

                                if($flag==1){echo   str_replace(['<p>','</p>'], ' ', $line);}
                                else{echo $line;}
                            }
                        }

                    }
                    elseif (isset($_GET['author'])){
                        echo BooksWidget::widget(['author'=>$_GET['author']]);
                    }
                    elseif (isset($_GET['aut'])){
                        echo BooksWidget::widget(['aut'=>$_GET['aut']]);
                    }
                    else{
                        echo BooksWidget::widget(['type'=>2]);
                    }

                    ?>
                </div>

            </div> <!-- End right-side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->


                    <h4><?= Html::encode($this->title) ?></h4>
                        <p>Авторы:</p>
                    <ul class="p0 category_item">
                    <?= BooksWidget::widget(['type'=>1])?>
                    </ul>

                <!-- End left side -->
            </div> <!-- End row -->
        </div>
</article>

<!-- =============== /blog container ============== -->