<?php

namespace app\controllers;

use Yii;
use app\models\Patrulha;
use app\models\PatrulhaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
//use app\models\Secao;
use app\models\Tropa;
/**
 * PatrulhaController implements the CRUD actions for Patrulha model.
 */
class PatrulhaController extends Controller
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
     * Lists all Patrulha models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatrulhaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patrulha model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Patrulha model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patrulha();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpatrulha]);
        }

        //$arraySecao = ArrayHelper::map(Secao::find()->all(), 'secao_idsecao', 'nome');
        $arrayTropa = ArrayHelper::map(Tropa::find()->all(), 'secao_idsecao', 'nome');

        return $this->render('create', [
            'model' => $model,
            //'arraySecao'  => $arraySecao,
            'arrayTropa'  => $arrayTropa,
        ]);
    }

    /**
     * Updates an existing Patrulha model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpatrulha]);
        }

        $arrayTropa = ArrayHelper::map(Tropa::find()->all(), 'secao_idsecao', 'nome');

        return $this->render('update', [
            'model' => $model,
            'arrayTropa'  => $arrayTropa,
        ]);
    }

    /**
     * Deletes an existing Patrulha model.
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
     * Finds the Patrulha model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patrulha the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patrulha::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
