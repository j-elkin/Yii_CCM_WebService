<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

use app\models\User;
use app\components\AccessRule;

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
                         //permitido a los usuarios admin y logistica
                        'roles'=>[
                            User::ROLE_ADMIN,
                            User::ROLE_LOGISTICA
                        ]
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                         //permitido a los usuarios admin y logistica
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_LOGISTICA
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
    //public $file_qr;
    public function actionCreate()
    {
        $model = new Persona();

        if ($model->load(Yii::$app->request->post()) ) {

            //Obtener la instancia del archivo QR subido
            $QrName = $model->docPersona;
            //El siguiente bloque se comento porque ya no se carga el codigo QR desde el form sino que se crea automatico a través de la API
            /*$model->file_qr = UploadedFile::getInstance($model, 'file_qr');

            if(!empty($model->file_qr)){ //Se ha cargado código qr para la persona

                //Guardando el path en el campo codigo_qr de la BD
                $model->codigo_qr = 'uploads/'.$QrName.'.'.$model->file_qr->extension;
                $model->save();
                //guardando el archivo en el servidor
                $model->file_qr->saveAs( 'uploads/'.$QrName.'.'.$model->file_qr->extension );
                
            }
            else{
                $model->codigo_qr = null;
                $model->save();
                
            }*/

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

        //Se comento porque ya no se carga el codigo qr desde input file. Este se genera automáticamente con la API
        //$nuevo_qr = UploadedFile::getInstance($model, 'file_qr');

        if ($model->load(Yii::$app->request->post()) ) {
            //Se guarda los datos del modelo en la BD
            $model->save();
            $documento = $model->docPersona;

            //Lo que se va a hacer ahora es consultar en la BD con el documento de la persona
            //los datos asociados de la misma, esto con fin de verificar si se cambio el numero de documento
            //para actualizar el Código QR si fuese el caso

            //Obteniendo el path del archivo QR almacenado al correspondiente documento
            //No funciono:
            /*$archivoQR = Persona::find()
                            ->select('codigo_qr')
                            ->where('docPersona = :documento', [':documento' => $documento])
                            ->one();*/
            $modeloConsulta = Persona::find()
                            ->where('docPersona = :documento', [':documento' => $documento])
                            ->one();

            $codigo_qr_consulta = (string) $modeloConsulta->codigo_qr;//casting ya que recibe un objeto

            if($codigo_qr_consulta != null){//Ya se asigno un codigo qr

                // uploads/12345.png
                $separa1 = explode("/", $codigo_qr_consulta );
                $separa2 = explode(".", $separa1[1]);
                if($separa2[0] != $documento){
                    //borra el antiguo QR
                    $this->findModel( $documento )->deleteImage($codigo_qr_consulta);//Importante el $documento. Ya no es con $id
                    
                    //Estableciento el nuevo QR
                    $model->codigo_qr='uploads/'.$documento.".png";//Con el nuevo documento
                    $model->save();

                    //Se genera el Código QR de acuerdo al documento de la persona a través de la API
                    // y se obtiene el archivo (imagen)
                    $contene = file_get_contents("https://api.qrserver.com/v1/create-qr-code/?data=".$documento."&amp;size=220x220&amp;format=png");
                    //Almacenar en el servidor.
                    $fp = fopen("uploads/".$documento.".png", "w");
                    fwrite($fp, $contene);
                    fclose($fp);
                }
            }else{//NO ha se ha asignado un código qr

                //Estableciento el nuevo QR
                $model->codigo_qr='uploads/'.$documento.".png";//Con el nuevo documento
                $model->save();

                //Se genera el Código QR de acuerdo al documento de la persona a través de la API
                // y se obtiene el archivo (imagen)
                $contene = file_get_contents("https://api.qrserver.com/v1/create-qr-code/?data=".$documento."&amp;size=220x220&amp;format=png");
                //Almacenar en el servidor.
                $fp = fopen("uploads/".$documento.".png", "w");
                fwrite($fp, $contene);
                fclose($fp);
            }


            return $this->redirect(['view', 'id' => $model->docPersona]);
            //El siquiente bloque se comento porque ya no se carga el codigo qr desde input file.
            //Este se genera automáticamente con la API en caso de actualizar el documento
            /*if (!empty($nuevo_qr) ) {

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
            }*/

            
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
        if($this->findModel($id)->codigo_qr != null){
            $this->findModel($id)->deleteImage( $this->findModel($id)->codigo_qr );
        }
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
