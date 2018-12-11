<?php

namespace app\modules\profile\controllers;

use app\models\Image;
use app\models\Prolong;
use Yii;
use app\models\Banners;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BannerController implements the CRUD actions for Banners model.
 */
class BannerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function timeOld($banner){ //проверка доступности

        if($banner->status == 1 && $banner->pay == 1){

            switch ($banner->period){
                case 0: //0 - 3
                    $timeOld = strtotime($banner->date. '+ '. 3 . ' month');
                    break;
                case 1://1 - 6
                    $timeOld = strtotime($banner->date. '+ '. 6 . ' month');
                    break;
                case 2://2 - 12
                    $timeOld = strtotime($banner->date. '+ '. 12 . ' month') ;
                    break;
                case 3://постоянно
                    $timeOld = strtotime($banner->date) ;
                    break;
            }



            if(time() < $timeOld or $banner->period == 3 ){
                return $flag=1;
            }
        }

    }

    /**
     * Lists all Banners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Banners::find()->where(['user'=>Yii::$app->user->id]),
            'sort' => [
                'defaultOrder'=>[
                    'id'=>SORT_DESC
                ]],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banners model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $image= Image::find()->where(['itemId'=>$model->id])->one();
        $model->image=$image->filePath;

        $timeOld= $this->timeOld($model);
        return $this->render('view', [
            'model' => $model, 'image' => $image->filePath, 'timeOld'=> $timeOld,
        ]);
    }

    /**
     * Creates a new Banners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Banners();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing Banners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Banners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionProlong($id){

        $model= new Banners();
        if($model->load(Yii::$app->request->post())){

//            debug($model);die;


            $model->id=$_GET['id'];

            return $this->render('/payment/banner',compact('model',''));
        }

        return $this->render('prolong',compact('model'));
    }

    /**
     * Finds the Banners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
