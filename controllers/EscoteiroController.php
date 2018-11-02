<?php

namespace app\controllers;

use Yii;
use app\models\Escoteiro;
use app\models\EscoteiroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Contato;
use app\models\Endereco;
use app\controllers\Setup;
/**
 * EscoteiroController implements the CRUD actions for Escoteiro model.
 */
class EscoteiroController extends Controller
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
     * Lists all Escoteiro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EscoteiroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Escoteiro model.
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
     * Creates a new Escoteiro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Escoteiro();
        $arrayContato = new Contato();
        $arrayEndereco = new Endereco();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //    return $this->redirect(['view', 'id' => $model->idescoteiro]);
        //}

        if($model->load(Yii::$app->request->post()) && $arrayEndereco->load(Yii::$app->request->post())
        && $arrayContato->load(Yii::$app->request->post()))
        {
            if($model->estado == 'ativo')
            {
                $model->estado = 1;
            }else if($model->estado == 'naoAtivo'){
                $model->estado = 0;
            }
            if($model->sexo == 'masculino')
            {
                $model->sexo = 'M';
            }else if($model->sexo == 'feminino'){
                $model->sexo = 'F';
            }
            $model->nascimento = Setup::convert($model->nascimento);
            if($model->save())
            {
                $arrayContato->Escoteiro_idescoteiro = $model->idescoteiro; 
                $arrayEndereco->Escoteiro_idescoteiro = $model->idescoteiro;
                if($arrayContato->save() && $arrayEndereco->save())
                {
                    return $this->redirect(['view', 
                        'id' => $model->idescoteiro,
                    ]);
                }
            }
        }


        return $this->render('create', [
            'model' => $model,
            'arrayContato' => $arrayContato,
            'arrayEndereco' => $arrayEndereco,
        ]);
    }

    /**
     * Updates an existing Escoteiro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $arrayContato = new Contato();
        $arrayEndereco = new Endereco();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idescoteiro]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrayContato' => $arrayContato,
            'arrayEndereco' => $arrayEndereco,
        ]);
    }

    /**
     * Deletes an existing Escoteiro model.
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
     * Finds the Escoteiro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Escoteiro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Escoteiro::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
