<?php

namespace app\controllers\rest;

use Yii;
use app\models\PersonaUbicacion;
use app\models\PersonaUbicacionSearch;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PersonaUbicacionController implements the CRUD actions for PersonaUbicacion model.
 */
class PersonaUbicacionController extends ActiveController
{

    public $modelClass = 'app\models\PersonaUbicacion';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all PersonaUbicacion models.
     * @return mixed
     */
    /*
    public function actionIndex()
    {
        $searchModel = new PersonaUbicacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    */

    /**
     * Displays a single PersonaUbicacion model.
     * @param string $persona_docPersona
     * @param integer $ubicacion_idubicacion
     * @return mixed
     */
    /*
    public function actionView($persona_docPersona, $ubicacion_idubicacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($persona_docPersona, $ubicacion_idubicacion),
        ]);
    }
    */

    /**
     * Creates a new PersonaUbicacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonaUbicacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PersonaUbicacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $persona_docPersona
     * @param integer $ubicacion_idubicacion
     * @return mixed
     */
    public function actionUpdate($persona_docPersona, $ubicacion_idubicacion)
    {
        $model = $this->findModel($persona_docPersona, $ubicacion_idubicacion);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PersonaUbicacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $persona_docPersona
     * @param integer $ubicacion_idubicacion
     * @return mixed
     */
    public function actionDelete($persona_docPersona, $ubicacion_idubicacion){
        if ( Yii::app()->request->idPostRequest ){
            $this->findModel($persona_docPersona, $ubicacion_idubicacion)->delete();
            return $this->redirect(['index']);
        }
        else{
            throw new HttpException('The Delete Method is only allowed by using POST Request');
        }
        
    }

    /**
     * Finds the PersonaUbicacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $persona_docPersona
     * @param integer $ubicacion_idubicacion
     * @return PersonaUbicacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($persona_docPersona, $ubicacion_idubicacion)
    {
        if (($model = PersonaUbicacion::findOne(['persona_docPersona' => $persona_docPersona, 'ubicacion_idubicacion' => $ubicacion_idubicacion])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
