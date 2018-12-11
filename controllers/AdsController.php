<?php

namespace app\controllers;
use app\models\Adsview;
use app\models\Banners;
use yii\data\Pagination;
use app\models\AdsGroup;
use app\models\Ads;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

class AdsController extends AppController
{

        public function behaviors(){
            return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'post'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?'],
                        ],
                    [
                        'allow' => true,
                        'actions' => ['post','index'],
                        'roles' => ['@'],
                        ],
                    ],
                ],
            ];
        }



    public $tags = 1400;

    public function getGroup($parent){
        $group = AdsGroup::find()->where(['parent_id'=>$parent])->all();
        $item = ArrayHelper::map($group,'id','name');

        return $item ;
    }
    public function getNameGroup($id){
        $group = AdsGroup::find()->where(['id'=>$id])->one();
        $item = $group['name'];
        return $item ;
    }

    public function actionIndex()
    {$this->metaTags($this->tags);

        //выборки------------------------------------
        if(isset($_GET['group'])) {
            //отсеивание по группе
            $query=Adsview::find()
            ->where(['group'=>$_GET['group']])
                ->andWhere(['status'=>1])
                ->andwhere(['premium'=>0])
                ->with('group0','images')
                ->orderBy(['id' => SORT_DESC]);
            $premium=Adsview::find()
                ->where(['premium'=>1])
                ->andWhere(['status'=>1])
                ->with('images')
                ->asArray()
                ->all();
            $pages = new Pagination( ['totalCount' => $query->count () , 'pageSize' => 12] );
            $ads=$query->offset ( $pages->offset )->limit ( $pages->limit )->asArray ()->all ();
            if($this->setTimeFlag($query) == 1){
                return $this->render('index',compact('ads','pages','premium'));
            }

        }
        elseif(isset($_GET['vc'])){
            //подробное отображение записи
            $ads=Adsview::find()->where(['id'=>$_GET['vc']])->with('images')->one();
            if($this->setTimeFlag($ads) == 1){
                return $this->render('index',compact('ads'));
            }
            else{ $ads = null;
                return $this->render('index',compact('ads'));
            }
        }
        else {
            //полный список записей
            $premium = Adsview::find()
                ->where(['premium' => 1])
                ->andWhere(['status' => 1])
                ->with('images')
                ->asArray()
                ->all();
            $query = Adsview::find()
                ->Where(['status' => 1])
                ->andwhere(['premium' => 0])
                ->with('images')
                ->orderBy(['id' => SORT_DESC]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12]);
            $ads = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();


            return $this->render('index', compact('ads', 'pages', 'premium'));
        }

    }

    public function setTimeFlag($dat){

//        $dat=$data[0]; //debug($dat);
        switch ($dat['type']){
            case 0: //0 - 3
                $timeOld = strtotime($dat['date']. '+ '. 1 . ' month');
                break;
            case 1://1 - 6
                $timeOld = strtotime($dat['date']. '+ '. 3 . ' month');
                break;
            case 2://постоянно
                $timeOld = strtotime($dat['date']) ;
                break;
            case 3://видео
                $timeOld = strtotime($dat['date']. '+ '. 1 . ' month');
                break;
            case 4:
                $timeOld = strtotime($dat['date']. '+ '. 3 . ' month');
                break;
            case 5:
                $timeOld = strtotime($dat['date']. '+ '. 12 . ' month');
                break;
        }

        if(time() < $timeOld or $dat['type'] == 2 ){
            return $flag = 1;
        }
        else {return $flag = 0;}
    }


    public function listGroup(){

        return $items =  [
            $this->getNameGroup(200)=>$this->getGroup(200),
            $this->getNameGroup(300)=>$this->getGroup(300),
            $this->getNameGroup(400)=>$this->getGroup(400),
            $this->getNameGroup(500)=>$this->getGroup(500),
            $this->getNameGroup(600)=>$this->getGroup(600),
            $this->getNameGroup(700)=>$this->getGroup(700),
        ];

    }

    public function actionPost(){

        $this->view->title = "Час пик | Заявка на размещение";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Разместить объявление']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Час пик  разместить объявление']);

        if(isset($_GET['message'])){
            switch ($_GET['message']) {
                case 1: //заказ баннера
                    $model=new Banners();
                    if($model->load(Yii::$app->request->post())){

                        if ($model->save()){
//                            проверка загрузки
                            $model->image = UploadedFile::getInstance($model, 'image');
//                            debug($model);
                            if( $model->image ){
                                $model->upload();
                            }
                            Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');
                            return $this->render('/payment/payment',compact('model'));
                        }
                        else{
                            Yii::$app->session->setFlash('error','Ошибка ввода');
                        }
                    }
                    break;
                case 2: //заказ простого


                    $items =  $this->listGroup();

                    $model = new Ads();
                    if($model->load(Yii::$app->request->post())){
//                        $qwe=Yii::$app->request->post();
//                        debug($qwe);
                        if ($model->save()){

                            $model->gallery = UploadedFile::getInstances($model, 'gallery');
                            $model->uploadGallery();

                            Yii::$app->session->setFlash('success','Спасибо ваше сообщение принято.');
                            return $this->render('/payment/payment',compact('model'));
                        }
                        else{
                            Yii::$app->session->setFlash('error','Ошибка ввода');
                        }
                    }
                    return $this->render('post',compact('model','items'));

                    break;

                case 3: ///заказ видео


                    break;

            }
        }
            return $this->render('post',compact('model','items'));

    }

}
