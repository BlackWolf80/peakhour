<?php

namespace app\controllers;
use app\assets\NormalAsset;
use app\models\Ads;
use app\models\Comments;
use app\models\Galery;
use app\models\MailForm;
use app\models\Psych;
use app\models\Publications;
use app\models\Publicgroup;
use app\models\User;
use app\models\Vacantion;
use app\models\Video;
use Yii;
use yii\debug\models\search\Mail;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//            debug(Yii::$app->user->identity['role']);

            $news= Publications::find()
                ->where(['group'=>2100])
                ->andWhere(['status'=>1])
                ->andWhere(['news'=>1])
                ->limit(4)
                ->orderBy(['id' => SORT_DESC])
                ->asArray()
                ->all();

        $this->metaTags(100);
        return $this->render('index',compact('news'));
    }

    public function actionPublic(){
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {

            $public = Publications::find()->with('comments','group0')->where(['id'=>$_GET['id']])->one();
            $galery = Galery::find()->where(['publication'=>$_GET['id']])->asArray()->all();

            $this->setMeta($public->title,$public->keywords,$public->description);

            return $this->render('public',compact('public','galery'));
        }
        return $this->redirect(['site/']);
    }

    public function actionVideo(){
        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {

                $id = $_GET['id'];


//            $this->setMeta($public->title,$public->keywords,$public->description);

            return $this->render('video',compact('public','id'));
        }
        return $this->redirect(['site/']);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionRegistr(){
        $this->view->title = "Час пик | Регистрация";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Час пик | Регистрация']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Час пик | Регистрация']);


        $model = new User();

        $password = Yii::$app->security->generateRandomString($length = 6);
        $hash_password = Yii::$app->getSecurity()->generatePasswordHash($password);

//        debug($password);
        if($model->load(Yii::$app->request->post())){
                $model->password = $hash_password;

            if ($model->save()){
                Yii::$app->session->setFlash('success','Спасибо ваши данные приняты. Пароль отправлен на E-mail указаный при регистрации');
                $this->mailRegistration($model->id,$model->email,$password);
                return $this->redirect('/site/login');
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка ввода');
            }
        }



        return $this->render('reg', compact('model'));
    }

    public function actionLegrotip(){

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRobots(){
    $this->layout= 'robots';
        ob_start();
        echo 'User-agent: *',PHP_EOL;
        echo 'Disallow: /usr',PHP_EOL;
        echo 'Disallow: /adm',PHP_EOL;
        echo 'HOST: http://peakhour.ru';
        return ob_get_clean();

    }


    public function actionSitemap(){
        $this->layout = 'robots';
$begin = '<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $end = '
</urlset>';


echo $begin;

echo   $string1 = '
    <url>
        <loc>http://www.peakhour.ru</loc><priority>0.9</priority>
    </url>
    <url>
        <loc>http://www.peakhour.ru/adversite</loc><priority>0.9</priority>
    </url>
                    ';


        $publicgroup=Publicgroup::find()->where(['status'=>1])->all();

        foreach ($publicgroup as $group){
            echo $string0 =  '
    <url>
        <loc>http://www.peakhour.ru'.Url::to([$group->address]).'</loc><priority>0.5</priority>
    </url>';
        }


        $ads= Ads::find()->where(['status'=>1])->all();

        foreach ($ads as $ad){
            echo $string2 =  '
    <url>
        <loc>http://www.peakhour.ru'.Url::to(['/ads', 'vc' => $ad->id]).'</loc><priority>0.5</priority>
    </url>';
        }


        $vacansions = Vacantion::find()->where(['status'=>1])->all();

        foreach ($vacansions as $vacansion){
       echo     $string3 =  '
    <url>
        <loc>http://www.peakhour.ru'.Url::to(['/vacancy', 'vc' => $vacansion->id]).'</loc><priority>0.5</priority>
    </url>';
        }


        echo $end;
    }


}
