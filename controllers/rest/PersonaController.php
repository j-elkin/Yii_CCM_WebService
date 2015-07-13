<?php

namespace app\controllers\rest;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends ActiveController
{

    public $modelClass = 'app\models\Persona';


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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();
        if ($model->load(Yii::$app->request->post()) ) {

            //Obtener la instancia del archivo QR subido
            $QrName = $_POST['docPersona'];
            
            $model->codigo_qr = 'uploads/'.$QrName.".png";
            $model->save();
            //Se genera el Código QR de acuerdo al documento de la persona a través de la API
            // y se obtiene el archivo (imagen)
            $contene = file_get_contents("https://api.qrserver.com/v1/create-qr-code/?data=".$QrName."&amp;size=220x220&amp;format=png");
            //Almacenar en el servidor.
            $fp = fopen("uploads/".$QrName.".png", "w");
            fwrite($fp, $contene);
            fclose($fp);
            return $this->redirect(['view', 'id' => $model->docPersona]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->docPersona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Persona model.
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
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionExist(){
        $docPersona = $_POST['docPersona'];
        $filas = (new Query())
        ->select(['p.docPersona', 'p.nombre', 'p.apellidos', 'p.correo_electronico'])
        ->from(['p' => 'persona'])
        ->where([
            'p.docPersona' => $docPersona
            ])
        ->all();

        //Se retorna resultado que es un array de arrays
        // IMPORTANTE: Al retornar el la variable $filas, se muestra en 
        // pantalla el resultado en XML, necesario para acceder por REST
        // a los datos
        return $filas;
    }
}
