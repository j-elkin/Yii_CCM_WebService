<?php

namespace app\controllers;

use Yii;
use app\models\Memoria;
use app\models\MemoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

use app\models\User;
use app\components\AccessRule;

/**
 * MemoriaController implements the CRUD actions for Memoria model.
 */
class MemoriaController extends Controller
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

            'access'=>[
                'class'=>AccessControl::classname(),
                 // Se ha sobreescrito la configuración de las reglas por defecto en la nueva clase components/AccessRulep.php
                'ruleConfig' => [
                    'class' => AccessRule::classname(),
                ],
                'only'=>['index', 'create', 'update', 'delete'],
                'rules'=>[
                    [
                        'actions' => ['create'],
                        'allow'=>true,
                         //permitido al usuario admin y logistica
                        'roles'=>[
                            User::ROLE_ADMIN,
                            User::ROLE_LOGISTICA
                        ]
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                         //permitido al usuario admin
                        'roles' => [
                            User::ROLE_ADMIN,
                        ]
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                         //permitido a los usuarios admin y logistica
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_LOGISTICA
                        ]
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                         //permitido al usuario admin
                        'roles' => [
                            User::ROLE_ADMIN,
                        ]
                    ],
                ]
            ],

        ];
    }

    /**
     * Lists all Memoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memoria model.
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
     * Creates a new Memoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Memoria();
        //APLICANDO SCENARIOS PARA LAS REGLAS DE VALIDACIÓN
        $model->scenario = 'registro';

        if ($model->load(Yii::$app->request->post()) ) {

            //Obtener la instancia del archivo subido
            $model->archivo_memoria = UploadedFile::getInstance($model, 'archivo_memoria');

            //Obteniendo el siguiente ID desde la BD
            $id = Memoria::find()->select('max(idmemoria)')->scalar() ;
            $id++;

            $nombre = $model->archivo_memoria->name;
            $nombre = $id.'_'.$nombre;
            //Guardando el nombre del archivo memoria en el campo archivo de la tabla memoria de la BD
            $model->archivo = $nombre;
            $model->save();

            //guardando el archivo en el servidor
            $model->archivo_memoria->saveAs('memorias/'.$nombre);

            return $this->redirect(['view', 'id' => $model->idmemoria]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Memoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //aplicando scenario de reglas de validación del formulario. Acá ya no se debe de exigir el archivo
        $model->scenario = 'actualiza';

        $nueva_memoria = UploadedFile::getInstance($model, 'archivo_memoria');
        if ($model->load(Yii::$app->request->post()) ) {

            if(!empty($nueva_memoria) ){//Se ha cargado un nuevo archivo de memoria
                //Borra el antiguo archivo de memoria
                $model->deleteArchivoMemoria();
                
                //Obtener la instancia del archivo subido
                $model->archivo_memoria = UploadedFile::getInstance($model, 'archivo_memoria');
                //obtiene el id de la BD
                $id = $model->idmemoria;
                $nombre = $model->archivo_memoria->name;
                $nombre = $id.'_'.$nombre;
                //Guardando el nombre del archivo memoria en el campo archivo de la tabla memoria de la BD
                $model->archivo = $nombre;
                $model->save();

                //guardando el archivo en el servidor
                $model->archivo_memoria->saveAs('memorias/'.$nombre);

                return $this->redirect(['view', 'id' => $model->idmemoria]);
            }
            else{//no se cargo un archivo
                $model->save();

                return $this->redirect(['view', 'id' => $model->idmemoria]);
            }

            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Memoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteArchivoMemoria();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Memoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Memoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
