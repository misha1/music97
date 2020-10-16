<?php


namespace frontend\controllers;


use common\models\Test;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionTest()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Test::find()->published()->latest()
        ]);
        return $this->render('test', [
            'dataProvider' => $dataProvider
        ]);
    }
}