<?php

namespace app\controllers;

use Yii;
use app\models\PersonaEvento;
use app\models\PersonaEventoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonaEventoController implements the CRUD actions for PersonaEvento model.
 */
class PersonaEventoController extends Controller
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
        ];
    }

    /**
     * Lists all PersonaEvento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaEventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonaEvento model.
     * @param integer $evento_idevento
     * @param integer $persona_idpersona
     * @return mixed
     */
    public function actionView($evento_idevento, $persona_idpersona)
    {
        return $this->render('view', [
            'model' => $this->findModel($evento_idevento, $persona_idpersona),
        ]);
    }

    /**
     * Creates a new PersonaEvento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonaEvento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'evento_idevento' => $model->evento_idevento, 'persona_idpersona' => $model->persona_idpersona]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PersonaEvento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $evento_idevento
     * @param integer $persona_idpersona
     * @return mixed
     */
    public function actionUpdate($evento_idevento, $persona_idpersona)
    {
        $model = $this->findModel($evento_idevento, $persona_idpersona);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'evento_idevento' => $model->evento_idevento, 'persona_idpersona' => $model->persona_idpersona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PersonaEvento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $evento_idevento
     * @param integer $persona_idpersona
     * @return mixed
     */
    public function actionDelete($evento_idevento, $persona_idpersona)
    {
        $this->findModel($evento_idevento, $persona_idpersona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PersonaEvento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $evento_idevento
     * @param integer $persona_idpersona
     * @return PersonaEvento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($evento_idevento, $persona_idpersona)
    {
        if (($model = PersonaEvento::findOne(['evento_idevento' => $evento_idevento, 'persona_idpersona' => $persona_idpersona])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
