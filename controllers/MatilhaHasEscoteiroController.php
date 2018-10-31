<?php

namespace app\controllers;

use Yii;
use app\models\MatilhaHasEscoteiro;
use app\models\MatilhaHasEscoteiroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatilhaHasEscoteiroController implements the CRUD actions for MatilhaHasEscoteiro model.
 */
class MatilhaHasEscoteiroController extends Controller
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
     * Lists all MatilhaHasEscoteiro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatilhaHasEscoteiroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MatilhaHasEscoteiro model.
     * @param integer $matilha_idmatilha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($matilha_idmatilha, $Escoteiro_idescoteiro)
    {
        return $this->render('view', [
            'model' => $this->findModel($matilha_idmatilha, $Escoteiro_idescoteiro),
        ]);
    }

    /**
     * Creates a new MatilhaHasEscoteiro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MatilhaHasEscoteiro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'matilha_idmatilha' => $model->matilha_idmatilha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MatilhaHasEscoteiro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $matilha_idmatilha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($matilha_idmatilha, $Escoteiro_idescoteiro)
    {
        $model = $this->findModel($matilha_idmatilha, $Escoteiro_idescoteiro);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'matilha_idmatilha' => $model->matilha_idmatilha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MatilhaHasEscoteiro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $matilha_idmatilha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($matilha_idmatilha, $Escoteiro_idescoteiro)
    {
        $this->findModel($matilha_idmatilha, $Escoteiro_idescoteiro)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MatilhaHasEscoteiro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $matilha_idmatilha
     * @param integer $Escoteiro_idescoteiro
     * @return MatilhaHasEscoteiro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($matilha_idmatilha, $Escoteiro_idescoteiro)
    {
        if (($model = MatilhaHasEscoteiro::findOne(['matilha_idmatilha' => $matilha_idmatilha, 'Escoteiro_idescoteiro' => $Escoteiro_idescoteiro])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
