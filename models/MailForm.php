<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 01.06.18
 * Time: 15:14
 */

namespace app\models;


class MailForm extends \yii\db\ActiveRecord{

    public $email,$name,$text,$verifyCode;

    public function rules()
    {
        return [
            [['name','email','text'], 'required'],
//            ['name','string','max'=>150],
//            ['text','string','max'=>500],
            [['email'], 'email'],
            ['verifyCode', 'captcha'],
        ];
    }



}