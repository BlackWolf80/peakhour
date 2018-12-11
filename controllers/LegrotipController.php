<?php

namespace app\controllers;


use Yii;
use app\models\Vacantion;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\LegrotipPrice;
use app\models\LegrotipPriceSearch;
use app\models\LegrotipPriceNZSMSearch;
use app\models\Publications;
use app\modules\adm\models\Galery;


class LegrotipController extends AppController
{
    public function actionIndex()
    {
        $this->view->title = "Час пик & Legrotip ресурс";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Час пик & Legrotip ресурс']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Час пик & Legrotip ресурс']);


        if(isset($_GET['vc'])){

            $query=Vacantion::find()
                ->Where(['status'=>1])
                ->andwhere(['organization'=>'ООО «ЛЕГРОТИП-Ресурс»'])
                ->orderBy(['id' => SORT_DESC]);
            $pages = new Pagination( ['totalCount' => $query->count () , 'pageSize' => 12] );
            $vacansions=$query->offset ( $pages->offset )->limit ( $pages->limit )->asArray ()->all ();
            return $this->render('index',compact('vacansions','pages','premium'));

        }
        elseif (isset($_GET['public'])){


                $public = Publications::find()->with('comments','group0')->where(['id'=>$_GET['public']])->one();
                $galery = Galery::find()->where(['publication'=>$_GET['public']])->asArray()->all();

                $this->setMeta($public->title,$public->keywords,$public->description);

                return $this->render('index',compact('public','galery'));


        }
        elseif (isset($_GET['price'])){

            switch ($_GET['price']){
                case 1:
                    $searchModel = new LegrotipPriceSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $dataProvider->pagination->pageSize=15;

                    return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);

                    break;

                case 2:
                    $searchModel = new LegrotipPriceNZSMSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $dataProvider->pagination->pageSize=15;

                    return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);

                    break;
            }



        }
        $data=LegrotipPrice::find()->all();
        return $this->render('index',compact('data'));
    }

}
