<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 20.06.18
 * Time: 23:44
 */

namespace app\modules\profile\controllers;
use yii\web\Controller;
use Yii;
use app\models\Users;

class UpdateController extends \app\controllers\AppController
{
    public function actionIndex(){

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

        return $this->render('index',['model'=>$model,'modelIns'=>$modelIns]);

    }

}