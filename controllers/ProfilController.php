<?php

namespace app\controllers;
use app\models\Ads;
use app\models\Banners;
use app\models\Users;
use yii\filters\AccessControl;
use yii;

class ProfilController extends AppController
{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $model=Users::find()->where(['id'=>Yii::$app->user->id])->one();
        $this->setMeta('Личный кабинет','Час пик Личный кабинет '.$model->name,'Час пик Личный кабинет '.$model->name);
        $banners=Banners::find()->where(['user'=>Yii::$app->user->id])->all();
        $ads=Ads::find()->where(['user'=>Yii::$app->user->id])->all();

        return $this->render('index',['model'=>$model,'banners'=>$banners,'ads'=>$ads,'modeFlag'=>0]);
    }


    public function actionUpdate(){
        $id=Yii::$app->user->id;
        $model = new Users();
        $modelIns=Users::find()->where(['id'=>Yii::$app->user->id])->one();
        $this->setMeta('Личный кабинет','Час пик Личный кабинет '.$modelIns->name,'Час пик Личный кабинет '.$modelIns->name);

        if ($model->load(Yii::$app->request->post())) {
            $password=Yii::$app->getSecurity()->generatePasswordHash($model->password);
            Yii::$app->db->createCommand("UPDATE user SET 
                                         password='$password', name='$model->name', email='$model->email', phone='$model->phone'  WHERE id='$id'")->execute();
        return $this->redirect('/profile');
        }

        return $this->render('index',['model'=>$model,'modelIns'=>$modelIns,'modeFlag'=>1]);
    }
}
