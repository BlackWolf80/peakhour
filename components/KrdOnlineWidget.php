<?php

namespace app\components;

use app\models\Online;
use Yii;
use app\models\Psych;
use yii\base\Widget;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\web\Controller;

class KrdOnlineWidget extends Widget{
    public $id;
    public $group;

    public function run()
    {
        if(isset($this->id)){
            $cam=Online::find()->where(['id'=>$this->id])->andWhere(['status'=>1])->one();


            if($cam->type == 0){


                echo '<div class="entry-content online_vid">';
                echo '<div class="iv-embed" style="margin:0 auto;padding:0;border:0;width:732px;">';
                echo '<div class="iv-v" style="display:block;margin:0;padding:1px;border:0;background:#000;">';
                echo '<iframe class="iv-i" style="display:block;margin:0;padding:0;border:0;"';
                echo 'src="'.$cam->src.'"frameborder="0" allowfullscreen></iframe>';
                echo '</div><div class="iv-b" style="display:block;margin:0;padding:0;border:0;">';
                echo '<div style="float:right;text-align:right;padding:0 0 10px;line-height:10px;">';
                echo '<a class="iv-a" style="font:10px Verdana,sans-serif;color:inherit;opacity:.6;" href="https://www.ivideon.com/" target="_blank">Powered by Ivideon</a>';
                echo '</div>';
                echo '<div style="clear:both;height:0;overflow:hidden;">&nbsp;</div></div></div></div>';

                echo '<div class="container">'.$cam->description.'</div>';
            }
            elseif ($cam->type == 1){

                echo '<div class="entry-content online_vid">';
                echo '<img src="'.$cam->src.'" id="camera" alt="" />';
                echo  '<script>
                        var camera = document.getElementById("camera");
                        var cameraSrc = camera.src;
                        setInterval(function(){
                            camera.src = cameraSrc + ((cameraSrc.indexOf("?") >= 0) ? "&rnd=" : "?rnd=") + Math.random();
                        }, 02 * 1000);
                    </script>
                </div>';
                echo '<br /><div class="container">'.$cam->description.'</div>';
            }

            else{}

        }
        elseif (isset($this->group)){
            $group=Online::find()->where(['group'=>$this->group])->andWhere(['status'=>1])->all();

            return $this->render('online',compact('group'));
        }

    }


}