<?php

namespace app\controllers;

use Yii;
use app\models\PersonaUbicacion;
use app\models\PersonaUbicacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Ubicacion;
use yii\filters\AccessControl;

use app\models\User;
use app\components\AccessRule;

/**
 * PersonaUbicacionController implements the CRUD actions for PersonaUbicacion model.
 */
class PersonaUbicacionController extends Controller
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
                         //permitido al usuario admin y logistica
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
                            User::ROLE_LOGISTICA
                        ]
                    ],
                ]
            ],

        ];
    }

    /**
     * Lists all PersonaUbicacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaUbicacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonaUbicacion model.
     * @param string $persona_docPersona
     * @param integer $ubicacion_idubicacion
     * @return mixed
     */
    public function actionView($persona_docPersona, $ubicacion_idubicacion)
    {
        return $this->render('view', [
            'model' => $this->findModel($persona_docPersona, $ubicacion_idubicacion),
        ]);
    }

    /**
     * Creates a new PersonaUbicacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonaUbicacion();

        if ($model->load(Yii::$app->request->post()) ) {

            $idUbicacion = $model->ubicacion_idubicacion;
            /*$cantidad = PersonaUbicacion::find()
                        ->where('ubicacion_idubicacion = :idUbicacion', [':idUbicacion' => $idUbicacion])
                        ->orderBy('ubicacion_idubicacion')
                        ->count();
            */
            $ubicacion = Ubicacion::find()
                        ->where('idubicacion = :idUbicacion', [':idUbicacion' => $idUbicacion])
                        ->one();

            //$limiteCupos = $ubicacion->limite_cupos;

            //if($cantidad == $limiteCupos){
            if($ubicacion->cupos_disponibles == 0 ){
                return $this->render('alerta_lim_cupos', 
                    ['model' => $ubicacion,]  );

            }
            else{
                $model->save();
                return $this->redirect(['view', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion]);
            }

        } else {
            return $this->renderAjax('create', [
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

        if ($model->load(Yii::$app->request->post()) ) {

            $idUbicacion = $model->ubicacion_idubicacion;
            $ubicacion = Ubicacion::find()
                        ->where('idubicacion = :idUbicacion', [':idUbicacion' => $idUbicacion])
                        ->one();

            if($ubicacion->cupos_disponibles == 0 ){
                return $this->render('alerta_lim_cupos', 
                    ['model' => $ubicacion,]  );
            }
            else{
                $model->save();
                return $this->redirect(['view', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion]);
            }
            
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
    public function actionDelete($persona_docPersona, $ubicacion_idubicacion)
    {
        $this->findModel($persona_docPersona, $ubicacion_idubicacion)->delete();

        return $this->redirect(['index']);
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
