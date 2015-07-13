<?php

namespace app\controllers\rest;

use Yii;
use app\models\Almuerzo;
use app\models\AlmuerzoSearch;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AlmuerzoController implements the CRUD actions for Almuerzo model.
 */
class AlmuerzoController extends ActiveController
{

	public $modelClass = 'app\models\Almuerzo';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),  [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all Almuerzo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlmuerzoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Almuerzo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /*
        actionNumeroalmuerzos es una función que se llama por método POST al siguiente link:
        http://localhost/Yii_CCM_WebService/web/index.php/rest/almuerzo/numeroalmuerzos
        Y consulta la cantidad de almuerzos consurimos por una persona (# de documento obtenido por POST)
    */
    public function actionNumeroalmuerzos(){
        $documento = $_POST['persona_docPersona'];

        $numAlmuerzos = Almuerzo::find()
                            ->where('persona_docPersona = :documento', [':documento' => $documento])
                            ->orderBy('persona_docPersona')
                            ->count();
        return $numAlmuerzos;
        
    }
    /**
     * Creates a new Almuerzo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Almuerzo();

        if ($model->load(Yii::$app->request->post()) ) {
            //&& $model->save()
           
            $model->save();
            return $this->redirect(['view', 'id' => $model->idAlmuerzo]);
            
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Almuerzo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idAlmuerzo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Almuerzo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Almuerzo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Almuerzo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Almuerzo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
