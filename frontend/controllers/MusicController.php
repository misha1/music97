<?php


namespace frontend\controllers;


use common\models\Music;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MusicController extends Controller
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

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Music::find()->published()->latest()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionView($id){
        $music = Music::findone($id);
        if(!$music){
            throw new NotFoundHttpException("Видео не найден");
        }

        return $this->render('view', [
            'model' => $music
        ]);
    }

}

