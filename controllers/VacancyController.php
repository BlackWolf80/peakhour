<?php

namespace app\controllers;

use app\models\VacantionGroup;
use yii;
use yii\helpers\ArrayHelper;
use app\models\Vacantion;
use yii\data\Pagination;
use yii\filters\AccessControl;


class VacancyController extends AppController
{


    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'payment'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['payment','index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionPayment(){
        $this->metaTags(800);
        $items =  [ //
            $this->getNameGroup(1)=>$this->getGroup(1),
            $this->getNameGroup(13)=>$this->getGroup(13),
            $this->getNameGroup(32)=>$this->getGroup(32),
            $this->getNameGroup(88)=>$this->getGroup(88),
            $this->getNameGroup(98)=>$this->getGroup(98),
            $this->getNameGroup(127)=>$this->getGroup(127),
            $this->getNameGroup(151)=>$this->getGroup(151),
            $this->getNameGroup(160)=>$this->getGroup(160),
            $this->getNameGroup(171)=>$this->getGroup(171),
            $this->getNameGroup(180)=>$this->getGroup(180),
            $this->getNameGroup(199)=>$this->getGroup(199),
            $this->getNameGroup(206)=>$this->getGroup(206),
            $this->getNameGroup(243)=>$this->getGroup(243),
            $this->getNameGroup(258)=>$this->getGroup(258),
            $this->getNameGroup(274)=>$this->getGroup(274),
            $this->getNameGroup(306)=>$this->getGroup(306),
            $this->getNameGroup(328)=>$this->getGroup(328),
            $this->getNameGroup(341)=>$this->getGroup(341),
            $this->getNameGroup(362)=>$this->getGroup(362),
            $this->getNameGroup(408)=>$this->getGroup(408),
            $this->getNameGroup(453)=>$this->getGroup(453),
            $this->getNameGroup(490)=>$this->getGroup(490),
            $this->getNameGroup(498)=>$this->getGroup(498),
            $this->getNameGroup(516)=>$this->getGroup(516),
            $this->getNameGroup(538)=>$this->getGroup(538),
            $this->getNameGroup(558)=>$this->getGroup(558),
            $this->getNameGroup(581)=>$this->getGroup(581),
            $this->getNameGroup(589)=>$this->getGroup(589),
        ];
        //добавить вакансию
        $model = new Vacantion();

        if($model->load(Yii::$app->request->post())){

            if ($model->save()){
                $post_array=Yii::$app->request->post();

                if($post_array['Vacantion']['premium'] !=0){   //если премиум вкл
                    return $this->render('/payment/payment',compact('model'));
                }

                Yii::$app->session->setFlash('success','Спасибо ваша заявка принята.');
                $this->mailVacantion($model->id);
                return $this->redirect('/vacancy');
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка ввода');
            }
        }

        return $this->render('post',compact('model','items'));


    }

    public function getGroup($parent){
       $group = VacantionGroup::find()->where(['parent_id'=>$parent])->all();
       $item = ArrayHelper::map($group,'id','name');

    return $item ;
   }
    public function getNameGroup($id){
        $group = VacantionGroup::find()->where(['id'=>$id])->one();
        $item = $group['name'];
        return $item ;
    }
    public function actionIndex()
    {
        $this->metaTags(800);

            if(isset($_GET['group']) && $_GET['group'] != "" && filter_var($_GET['group'],FILTER_VALIDATE_INT)) {
                $query=Vacantion::find() //отсеивание по группе
                    ->where(['group_id'=>$_GET['group']])
                    ->andWhere(['status'=>1])
                    ->andwhere(['premium'=>0])
                    ->orderBy(['id' => SORT_DESC]);
                $premium=Vacantion::find()
                    ->where(['premium'=>2])
                    ->andWhere(['status'=>1])
                    ->asArray()
                    ->all();
                $pages = new Pagination( ['totalCount' => $query->count () , 'pageSize' => 12] );
                $vacansions=$query->offset ( $pages->offset )->limit ( $pages->limit )->asArray ()->all ();
                return $this->render('index',compact('vacansions','pages','premium'));
            }
            elseif(isset($_GET['vc'])){ //подробное отображение записи
                $vacansion=Vacantion::findOne($_GET['vc']);
                return $this->render('index',compact('vacansion'));
            }
            else{//полный список записей
                $premium=Vacantion::find()
                    ->where(['premium'=>2])
                    ->andWhere(['status'=>1])
                    ->asArray()
                    ->all();
                $query=Vacantion::find()
                    ->Where(['status'=>1])
                    ->andwhere(['premium'=>0])
                    ->orderBy(['id' => SORT_DESC]);
                $pages = new Pagination( ['totalCount' => $query->count () , 'pageSize' => 12] );
                $vacansions=$query->offset ( $pages->offset )->limit ( $pages->limit )->asArray ()->all ();
                return $this->render('index',compact('vacansions','pages','premium'));
                }

    }

}
