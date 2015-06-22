<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
    public $file_qr;
    public function actionCreate()
    {
        $model = new Persona();

        if ($model->load(Yii::$app->request->post()) ) {

            //Obtener la instancia del archivo QR subido
            $QrName = $model->docPersona;
            $model->file_qr = UploadedFile::getInstance($model, 'file_qr');
            //$model->file_qr->saveAs( 'uploads/'.$QrName.'.'.$model->file_qr->extension );

            //Guardando el path en el campo codigo_qr de la BD
            $model->codigo_qr = 'uploads/'.$QrName.'.'.$model->file_qr->extension;
            $model->save();
            //guardando el archivo en el servidor
            $model->file_qr->saveAs( 'uploads/'.$QrName.'.'.$model->file_qr->extension );

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

        $nuevo_qr = UploadedFile::getInstance($model, 'file_qr');

        if ($model->load(Yii::$app->request->post()) ) {

            if (!empty($nuevo_qr) ) {

                if($model->codigo_qr!=null){
                    //borra el antiguo QR
                    $this->findModel($id)->deleteImage();
                }

                //Obtener la instancia del nuevo QR subido
                $model->file_qr = UploadedFile::getInstance($model, 'file_qr');
                $QrName = $model->docPersona;
                
                //$model->file_qr->saveAs( 'uploads/'.$QrName.'.'.$model->file_qr->extension );

                //Guardando el path en el campo codigo_qr de la BD
                $model->codigo_qr = 'uploads/'.$QrName.'.'.$model->file_qr->extension;
                $model->save();
                //guardando el archivo en el servidor
                $model->file_qr->saveAs( 'uploads/'.$QrName.'.'.$model->file_qr->extension );

                return $this->redirect(['view', 'id' => $model->docPersona]);
            }
            else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->docPersona]);
            }

            
        }
         else {
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
        $this->findModel($id)->deleteImage();
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
}
