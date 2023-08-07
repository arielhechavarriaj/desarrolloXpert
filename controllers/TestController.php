<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;

class TestController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Test';
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actions(): array
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => fn() => new ActiveDataProvider(
                [
                    'query' => $this->modelClass::find(),
                    'pagination' => false,
                ]
            ),
        ];

        return $actions;
    }
}
