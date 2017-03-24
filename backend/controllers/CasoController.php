<?php

namespace backend\controllers;

use Yii;
use backend\models\Caso;
use backend\models\CasoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Prueba;
use backend\models\Detalleprueba;
use backend\models\Model;
use yii\helpers\ArrayHelper;
/**
 * CasoController implements the CRUD actions for Caso model.
 */
class CasoController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Caso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CasoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caso model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelsPrueba' => $this->findModel($id)->pruebas,
        ]);
    }

    /**
     * Creates a new Caso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model         = new Caso();
        $modelsPrueba  = [new Prueba];
        $modelsDetalle = [[new Detalleprueba]];

        if ($model->load(Yii::$app->request->post())) {

            $modelsPrueba = Model::createMultiple(House::classname());
            Model::loadMultiple($modelsPrueba, Yii::$app->request->post());

            // validate person and houses models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPrueba) && $valid;

            if (isset($_POST['Detalleprueba'][0][0])) {
                foreach ($_POST['Detalleprueba'] as $indexPrueba => $detalles) {
                    foreach ($detalles as $indexDetalle => $detalle) {
                        $data['Detalleprueba'] = $detalle;
                        $modelDetalle = new Detalleprueba;
                        $modelDetalle->load($data);
                        $modelsDetalle[$indexPrueba][$indexDetalle] = $modelDetalle;
                        $valid = $modelDetalle->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPrueba as $indexPrueba => $modelPrueba) {

                            if ($flag === false) {
                                break;
                            }

                            $modelPrueba->idCaso = $model->id;

                            if (!($flag = $modelPrueba->save(false))) {
                                break;
                            }

                            if (isset($modelsDetalle[$indexPrueba]) && is_array($modelsDetalle[$indexPrueba])) {
                                foreach ($modelsDetalle[$indexPrueba] as $indexDetalle => $modelDetalle) {
                                    $modelDetalle->idPrueba = $modelPrueba->id;

                                    if( $modelDetalle->idOperation == 2 )
                                    {
                                        $cordX1 = $modelDetalle->cordX1;
                                        $cordY1 = $modelDetalle->cordY1;
                                        $cordZ1 = $modelDetalle->cordZ1;
                                        $cordX2 = $modelDetalle->cordX2;
                                        $cordY2 = $modelDetalle->cordY2;
                                        $cordZ2 = $modelDetalle->cordZ2;

                                        $detallesaux = Detalleprueba::find()->where(['idPrueba'=>$modelPrueba->id])->andWhere(['idOperation'=>1])->all();
                                        $res = 0;
                                        foreach ($detallesaux as $key => $detalleaux) {
                                            $cordX1i = $detallesaux->cordX1;
                                            $cordY1i = $detallesaux->cordY1;
                                            $cordZ1i = $detallesaux->cordZ1;
                                            //$cordX2i = $detallesaux->cordX2;
                                            //$cordY2i = $detallesaux->cordY2;
                                            //$cordZ2i = $detallesaux->cordZ2;

                                            if( ($cordX1 <= $cordX1i && $cordY1 <= $cordY1i && $cordZ1 <= $cordZ1i) && ($cordX2 >= $cordX1i && $cordY2 >= $cordY1i && $cordZ2 >= $cordZ1i) )
                                            {
                                                $res += $detallesaux->vlrW;
                                            }

                                        }

                                        $modelDetalle->resultado = $res;
                                    }
                                    else
                                    {
                                        $modelDetalle->resultado = $modelDetalle->vlrW;
                                    }


                                    if (!($flag = $modelDetalle->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        }

        return $this->render('create', [
            'model'        => $model,
            'modelsPrueba' => (empty($modelsPrueba)) ? [new Prueba] : $modelsPrueba,
            'modelsDetalle'=> (empty($modelsDetalle)) ? [[new Detalleprueba]] : $modelsDetalle,
        ]);
    }

    /**
     * Updates an existing Caso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model         = $this->findModel($id);
        $modelsPrueba  = $model->pruebas;
        $modelsDetalle = [];
        $oldDetalles   = [];

        if (!empty($modelsPrueba)) {
            foreach ($modelsPrueba as $indexPrueba => $modelPrueba) {
                $detalles = $modelPrueba->detallepruebas;
                $modelsDetalle[$indexPrueba] = $detalles;
                $oldDetalles = ArrayHelper::merge(ArrayHelper::index($detalles, 'id'), $oldDetalles);
            }
        }

        if ($model->load(Yii::$app->request->post())) {

            // reset
            $modelsDetalle = [];

            $oldPruebaIDs     = ArrayHelper::map($modelsPrueba, 'id', 'id');
            $modelsPrueba     = Model::createMultiple(House::classname(), $modelsPrueba);
            Model::loadMultiple($modelsPrueba, Yii::$app->request->post());
            $deletedPruebaIDs = array_diff($oldPruebaIDs, array_filter(ArrayHelper::map($modelsPrueba, 'id', 'id')));

            // validate person and houses models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPrueba) && $valid;

            $detallesIDs = [];
            if (isset($_POST['Detalleprueba'][0][0])) {
                foreach ($_POST['Detalleprueba'] as $indexPrueba => $detalles) {
                    $detallesIDs = ArrayHelper::merge($detallesIDs, array_filter(ArrayHelper::getColumn($detalles, 'id')));
                    foreach ($detalles as $indexDetalle => $detalle) {
                        $data['Detalleprueba'] = $detalle;
                        $modelDetalle = (isset($detalle['id']) && isset($oldDetalles[$detalle['id']])) ? $oldDetalles[$detalle['id']] : new Detalleprueba;
                        $modelDetalle->load($data);
                        $modelsRoom[$indexPrueba][$indexDetalle] = $modelDetalle;
                        $valid = $modelDetalle->validate();
                    }
                }
            }

            $oldDetallesIDs     = ArrayHelper::getColumn($oldDetalles, 'id');
            $deletedDetallesIDs = array_diff($oldDetallesIDs, $detallesIDs);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {

                        if (! empty($deletedDetallesIDs)) {
                            Detalleprueba::deleteAll(['id' => $deletedDetallesIDs]);
                        }

                        if (! empty($deletedPruebaIDs)) {
                            Prueba::deleteAll(['id' => $deletedPruebaIDs]);
                        }

                        foreach ($modelsPrueba as $indexPrueba => $modelPrueba) {

                            if ($flag === false) {
                                break;
                            }

                            $modelPrueba->idCaso = $model->id;

                            if (!($flag = $modelPrueba->save(false))) {
                                break;
                            }

                            if (isset($modelsDetalle[$indexPrueba]) && is_array($modelsDetalle[$indexPrueba])) {
                                foreach ($modelsDetalle[$indexPrueba] as $indexDetalle => $modelDetalle) {
                                    $modelDetalle->idPrueba = $modelPrueba->id;
                                    if (!($flag = $modelDetalle->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model'         => $model,
            'modelsPrueba'  => (empty($modelsPrueba)) ? [new Prueba] : $modelsPrueba,
            'modelsDetalle' => (empty($modelsDetalle)) ? [[new Detalleprueba]] : $modelsDetalle
        ]);
    }

    /**
     * Deletes an existing Caso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name  = $model->nroCasos;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '# Casos  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
