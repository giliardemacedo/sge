<?php

namespace app\controllers;

use Yii;
use app\models\EscoteiroHasReuniao;
use app\models\EscoteiroHasReuniaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EscoteiroHasReuniaoController implements the CRUD actions for EscoteiroHasReuniao model.
 */
class EscoteiroHasReuniaoController extends Controller
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
     * Lists all EscoteiroHasReuniao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EscoteiroHasReuniaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EscoteiroHasReuniao model.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $reuniao_idreuniao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Escoteiro_idescoteiro, $reuniao_idreuniao)
    {
        return $this->render('view', [
            'model' => $this->findModel($Escoteiro_idescoteiro, $reuniao_idreuniao),
        ]);
    }

    /**
     * Creates a new EscoteiroHasReuniao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EscoteiroHasReuniao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'reuniao_idreuniao' => $model->reuniao_idreuniao]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EscoteiroHasReuniao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $reuniao_idreuniao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Escoteiro_idescoteiro, $reuniao_idreuniao)
    {
        $model = $this->findModel($Escoteiro_idescoteiro, $reuniao_idreuniao);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Escoteiro_idescoteiro' => $model->Escoteiro_idescoteiro, 'reuniao_idreuniao' => $model->reuniao_idreuniao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EscoteiroHasReuniao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $reuniao_idreuniao
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Escoteiro_idescoteiro, $reuniao_idreuniao)
    {
        $this->findModel($Escoteiro_idescoteiro, $reuniao_idreuniao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EscoteiroHasReuniao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Escoteiro_idescoteiro
     * @param integer $reuniao_idreuniao
     * @return EscoteiroHasReuniao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Escoteiro_idescoteiro, $reuniao_idreuniao)
    {
        if (($model = EscoteiroHasReuniao::findOne(['Escoteiro_idescoteiro' => $Escoteiro_idescoteiro, 'reuniao_idreuniao' => $reuniao_idreuniao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
