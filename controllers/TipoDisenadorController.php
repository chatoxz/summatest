<?php

namespace app\controllers;

use Yii;
use app\models\TipoDisenador;
use app\models\TipoDisenadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoDisenadorController implements the CRUD actions for TipoDisenador model.
 */
class TipoDisenadorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'save-as-new', 'add-disenador'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all TipoDisenador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoDisenadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isAjax){
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single TipoDisenador model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerDisenador = new \yii\data\ArrayDataProvider([
            'allModels' => $model->disenadors,
        ]);
        if (Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $model,
                'providerDisenador' => $providerDisenador,
            ]);
        }else{
            return $this->render('view', [
                'model' => $model,
                'providerDisenador' => $providerDisenador,
            ]);
        }
    }

    /**
     * Creates a new TipoDisenador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoDisenador();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if (Yii::$app->request->isAjax){
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing TipoDisenador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new TipoDisenador();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //return $this->redirectAjax(['view', 'id' => $model->id]);
        } else {
            if (Yii::$app->request->isAjax){
                return $this->renderAjax('update', [
                  'model' => $model,
                ]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing TipoDisenador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
    * Creates a new TipoDisenador model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id) {
        $model = new TipoDisenador();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if (Yii::$app->request->isAjax){
                return $this->renderAjax('saveAsNew', [
                    'model' => $model,
                ]);
            }else{
                return $this->render('saveAsNew', [
                    'model' => $model,
                ]);
            }
        }
    }
    
    /**
     * Finds the TipoDisenador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TipoDisenador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipoDisenador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Disenador
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddDisenador()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Disenador');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formDisenador', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
