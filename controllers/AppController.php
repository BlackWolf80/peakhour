<?php

namespace app\controllers;
use app\models\Comments;
use app\models\Galery;
use app\models\Params;
use app\models\Publications;
use app\models\Publicgroup;
use yii\web\Controller;
use Yii;

class AppController extends Controller
{

    public function init(){
        if(Yii::$app->user->identity['role']=='root'){
            $this->layout = 'main';
        }
        else{
            $this->layout = loadLayout('service');
        }

        parent::init();
    }

    public function debug($arr){
        echo '<pre>'. print_r($arr, true).'</pre>';
    }


    public function metaTags($ind){
        $dat=Publicgroup::findOne($ind);
        $this->view->title = 'Час пик | '.$dat->title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $dat->keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $dat->description]);
    }

    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = 'Час пик | '.$title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    public function publicgroupViewer($id){
        if(isset($id) && $id != "" && filter_var($id,FILTER_VALIDATE_INT)) {
            $publication=Publications::find()
                ->where(['group'=>$id])
                ->andWhere(['status'=>1])
                ->orderBy(['id' => SORT_DESC])
                ->asArray()
                ->all();
            $this->metaTags($id);
            return  $publication;
        }
    return null;
    }

    public function mailVacantion($id){
        $model=\app\models\Vacantion::findOne($id);
        $admin_email= Yii::$app->params['adminEmail'];
        $subject='Запрос на размещение вакансии '.$model->vac_name;


        Yii::$app->mailer->compose ('vacant', ['vc' => $model])
            ->setFrom ([$admin_email=>'Сервис обратной связи Час-Пик'])
            ->setTo ($admin_email)
            ->setSubject ('Запрос на размещение вакансии '.$model->vac_name)
            ->send ();

//        $this->mailSend($admin_email,$admin_email,$model,$subject,'vacant');
    }

    public function mailRegistration($id,$userMail,$password){
        $model=\app\models\User::findOne($id);
        $model['password']=$password;
        $subject='Запрос на регистрацию '.$model->username;
        $admin_email= Yii::$app->params['adminEmail'];
        $this->mailSend($admin_email,$admin_email,$model,$subject,'registration');
        //для пользователя
        $this->mailSend($admin_email,$userMail,$model,$subject,'registration');
    }

    public function mailSend($emFrom,$emTo,$model,$subject,$layoutMessage){
        Yii::$app->mailer->compose ($layoutMessage, ['model' => $model])
            ->setFrom ([$emFrom => 'Сервис обратной связи Час-Пик']) //от кого
            ->setTo ($emTo)                                          //кому
            ->setSubject ($subject)                                  //заголовок
            ->send ();
    }

}
function debug($arr){echo '<pre>'. print_r($arr, true).'</pre>';}


