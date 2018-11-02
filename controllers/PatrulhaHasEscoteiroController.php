<?php

namespace app\controllers;

use Yii;
use app\models\PatrulhaHasEscoteiro;
use app\models\PatrulhaHasEscoteiroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use app\models\Escoteiro;
use app\models\Patrulha;
/**
 * PatrulhaHasEscoteiroController implements the CRUD actions for PatrulhaHasEscoteiro model.
 */
class PatrulhaHasEscoteiroController extends Controller
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
     * Lists all PatrulhaHasEscoteiro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatrulhaHasEscoteiroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatrulhaHasEscoteiro model.
     * @param integer $patrulha_idpatrulha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($patrulha_idpatrulha, $Escoteiro_idescoteiro)
    {
        return $this->render('view', [
            'model' => $this->findModel($patrulha_idpatrulha, $Escoteiro_idescoteiro),
        ]);
    }

    /**
     * Creates a new PatrulhaHasEscoteiro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PatrulhaHasEscoteiro();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'patrulha_idpatrulha' => $model->patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]);
        }

        $arrayEscoteiro = ArrayHelper::map(Escoteiro::find()->all(), 'idescoteiro', 'nome');
        $arrayPatrulha = ArrayHelper::map(Patrulha::find()->all(), 'idpatrulha', 'nome');

        return $this->render('create', [
            'model' => $model,
            'arrayEscoteiro' => $arrayEscoteiro,
            'arrayPatrulha' => $arrayPatrulha,
        ]);
    }

    /**
     * Updates an existing PatrulhaHasEscoteiro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $patrulha_idpatrulha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($patrulha_idpatrulha, $Escoteiro_idescoteiro)
    {
        $model = $this->findModel($patrulha_idpatrulha, $Escoteiro_idescoteiro);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'patrulha_idpatrulha' => $model->patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrayEscoteiro' => $arrayEscoteiro,
            'arrayPatrulha' => $arrayPatrulha,
        ]);
    }

    /**
     * Deletes an existing PatrulhaHasEscoteiro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $patrulha_idpatrulha
     * @param integer $Escoteiro_idescoteiro
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($patrulha_idpatrulha, $Escoteiro_idescoteiro)
    {
        $this->findModel($patrulha_idpatrulha, $Escoteiro_idescoteiro)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatrulhaHasEscoteiro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $patrulha_idpatrulha
     * @param integer $Escoteiro_idescoteiro
     * @return PatrulhaHasEscoteiro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($patrulha_idpatrulha, $Escoteiro_idescoteiro)
    {
        if (($model = PatrulhaHasEscoteiro::findOne(['patrulha_idpatrulha' => $patrulha_idpatrulha, 'Escoteiro_idescoteiro' => $Escoteiro_idescoteiro])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
