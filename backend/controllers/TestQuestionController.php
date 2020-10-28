<?php

namespace backend\controllers;

use common\models\Answer;
use Yii;
use common\models\TestQuestion;
use common\models\TestQuestionSearch;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TestQuestionController implements the CRUD actions for TestQuestion model.
 */
class TestQuestionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TestQuestion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestQuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new TestQuestion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TestQuestion;
        $model->question_id = 'BLxbSc0T';
        $AnswerModel = [new Answer];

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Model::loadMultiple($AnswerModel, Yii::$app->request->post());
            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('create', [
                'model' => $model,
                'AnswerModel' => (empty($AnswerModel)) ? [new Answer] : $AnswerModel
            ]);
        }
    }
//            return $this->redirect(['update', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//            'AnswerModel' => $AnswerModel
//        ]);
//    }

    /**
     * Updates an existing TestQuestion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $AnswerModel = $model->answers;
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Model::loadMultiple($AnswerModel, Yii::$app->request->post());
            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('update', [
                'model' => $model,
                'AnswerModel' => (empty($AnswerModel)) ? [new Answer] : $AnswerModel
            ]);
        }
    }

    /**
     * Deletes an existing TestQuestion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TestQuestion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TestQuestion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TestQuestion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
