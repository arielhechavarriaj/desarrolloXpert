<?php

namespace app\\controllers\;

class TestController extends \yii\\rest\\ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
