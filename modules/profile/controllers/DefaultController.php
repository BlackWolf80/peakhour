<?php

namespace app\modules\profile\controllers;
use app\models\Ads;
use app\models\Banners;
use app\models\Users;
use app\models\Vacantion;
use yii\filters\AccessControl;
use yii;
use yii\web\Controller;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends \app\controllers\AppController
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
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model=Users::find()->where(['id'=>Yii::$app->user->id])->one();
        $this->setMeta('Личный кабинет','Час пик Личный кабинет '.$model->name,'Час пик Личный кабинет '.$model->name);
        $banners=Banners::find()->where(['user'=>Yii::$app->user->id])->all();
        $ads=Ads::find()->where(['user'=>Yii::$app->user->id])->all();
        $vacantions=Vacantion::find()->where(['user'=>Yii::$app->user->id])->all();
        return $this->render('index',['model'=>$model,'banners'=>$banners,'ads'=>$ads,'vacantions' => $vacantions,'modeFlag'=>0]);

    }
}
