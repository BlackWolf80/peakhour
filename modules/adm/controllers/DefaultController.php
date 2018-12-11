<?php

namespace app\modules\adm\controllers;



/**
 * Default controller for the `adm` module
 */
class DefaultController extends AppAdmController{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
