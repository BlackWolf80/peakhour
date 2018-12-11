<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 15.05.2016
 * Time: 15:53
 */

namespace app\modules\adm\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;



class AppAdmController extends Controller{

//    public function behaviors(){
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['@']
//                    ]
//                ]
//            ]
//        ];
//    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [User::ROLE_ADMIN],
                    ],
                ],
            ],
        ];
    }
}





