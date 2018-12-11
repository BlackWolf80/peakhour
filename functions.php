<?php
use app\models\Params;

function debug($arrr){
    echo '<pre>'. print_r($arrr, true).'</pre>';
}


function loadParams($name){
    $paramArray = Params::find()->where(['name'=>$name])->one();
    return $paramArray->value;
}

function loadLayout($name){
    $param=loadParams($name);
    if($param==1){$layout='service';}
    else{$layout='main';}
    return $layout;
}

function loadDebug(){
    if(loadParams('debug')==1){
        return ['0'=>'YII_DEBUG','1'=>'YII_ENV'];
    }
}