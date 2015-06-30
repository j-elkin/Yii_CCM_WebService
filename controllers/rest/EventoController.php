<?php

namespace app\controllers\rest;

use Yii;
use app\models\Evento;
use app\models\EventoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * EventoController implements the CRUD actions for Evento model.
 */
class EventoController extends ActiveController
{

    public $modelClass = 'app\models\Evento';

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


    /*
        actionSql es una función que se llama por método POST al siguiente link;
        http://localhost/Yii_CCM_WebService/web/index.php/rest/evento/sql
        Y consulta todos los eventos asociados a un dia y área en particular
    */
    public function actionSql(){
        //Se reciben los parametros enviados por POST:
        $idtipo_area = $_POST['idtipo_area'];
        $dia = $_POST['dia'];

        //Se crea la consulta SQL para extraer los eventos asociados a un área y dia en particular
        $filas = (new Query())
        ->select(['e.nombre', 'e.descripcion', 'u.hora_inicio', 'u.hora_fin', 'u.lugar', 'u.limite_cupos', 'u.fecha'])
        ->from(['ta' => 'tipo_area'])
        ->innerJoin('evento e', 'ta.idtipo_area = e.tipo_area_idtipo_area')
        ->innerJoin('ubicacion u', 'e.idevento = u.evento_idevento')
        ->where([
            'ta.idtipo_area' => $idtipo_area,
            'dayname(u.fecha)' => $dia
            ])
        ->all();

        //Se retorna resultado que es un array de arrays
        // IMPORTANTE: Al retornar el la variable $filas, se muestra en 
        // pantalla el resultado en XML, necesario para acceder por REST
        // a los datos
        return $filas;
    }





    /**
     * Lists all Evento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Evento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Evento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idevento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Evento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idevento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Evento model.
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
     * Finds the Evento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
