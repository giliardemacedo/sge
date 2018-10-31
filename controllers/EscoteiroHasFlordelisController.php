<?php

namespace app\controllers;

use Yii;
use app\models\EscoteiroHasFlordelis;
use app\models\EscoteiroHasFlordelisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EscoteiroHasFlordelisController implements the CRUD actions for EscoteiroHasFlordelis model.
 */
class EscoteiroHasFlordelisController extends Controller
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
     * Lists all EscoteiroHasFlordelis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EscoteiroHasFlordelisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EscoteiroHasFlordelis model.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $flordelis_secao_idsecao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Escoteiro_idescoteiro, $flordelis_secao_idsecao)
    {
        return $this->render('view', [
            'model' => $this->findModel($Escoteiro_idescoteiro, $flordelis_secao_idsecao),
        ]);
    }

    /**
     * Creates a new EscoteiroHasFlordelis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EscoteiroHasFlordelis();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $model->flordelis_secao_idsecao]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EscoteiroHasFlordelis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $flordelis_secao_idsecao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Escoteiro_idescoteiro, $flordelis_secao_idsecao)
    {
        $model = $this->findModel($Escoteiro_idescoteiro, $flordelis_secao_idsecao);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $model->flordelis_secao_idsecao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EscoteiroHasFlordelis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $flordelis_secao_idsecao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Escoteiro_idescoteiro, $flordelis_secao_idsecao)
    {
        $this->findModel($Escoteiro_idescoteiro, $flordelis_secao_idsecao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EscoteiroHasFlordelis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $flordelis_secao_idsecao
     * @return EscoteiroHasFlordelis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Escoteiro_idescoteiro, $flordelis_secao_idsecao)
    {
        if (($model = EscoteiroHasFlordelis::findOne(['Escoteiro_idescoteiro' => $Escoteiro_idescoteiro, 'flordelis_secao_idsecao' => $flordelis_secao_idsecao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
