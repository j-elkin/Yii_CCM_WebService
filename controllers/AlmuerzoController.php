<?php

namespace app\controllers;

use Yii;
use app\models\Almuerzo;
use app\models\AlmuerzoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\filters\VerbFilter;
use kartik\widgets\Alert;
use kartik\widgets\AlertBlock;
use yii\filters\AccessControl;

use app\models\User;
use app\components\AccessRule;

/**
 * AlmuerzoController implements the CRUD actions for Almuerzo model.
 */
class AlmuerzoController extends Controller
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


    public function actionSql(){
        $filas = (new Query())
        ->select(['ta.tipo_area', 'e.idevento', 'e.nombre', 'e.descripcion', 'u.hora_inicio', 'u.hora_fin', 'u.lugar', 'u.limite_cupos', 'u.fecha'])
        ->from(['ta' => 'tipo_area'])
        ->innerJoin('evento e', 'ta.idtipo_area = e.tipo_area_idtipo_area')
        ->innerJoin('ubicacion u', 'e.idevento = u.evento_idevento')
        ->where([
            'ta.idtipo_area' => 1,
            'dayname(u.fecha)' => 'Monday'
            ])
        ->all();

        //print_r($filas[0]);
        /*
        foreach ( $filas as $fila ){
            print_r($fila) . "<br><br>";
            foreach ( $fila as $key=>$value ){
                echo $key . " => " . $value . "<br>";
            }
            echo "<br>";
        }
        */
        
        return $this->render( 'sql', [
            'filas' => $filas,
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
            //return "alert('hola')";
            $documento = $model->persona_docPersona;
            $numAlmuerzos = Almuerzo::find()
                            ->where('persona_docPersona = :documento', [':documento' => $documento])
                            ->orderBy('persona_docPersona')
                            ->count();

            if ($numAlmuerzos >= 4){
                /*return Alert::widget([
                    'type' => Alert::TYPE_WARNING,
                    'title' => 'Almuerzos consumidos!',
                    'icon' => 'glyphicon glyphicon-exclamation-sign',
                    'body' => 'La persona con documento N° '.$documento." ya consumio todos los almuerzos.",
                    'showSeparator' => true,
                    'delay' => 6000
                ]);*/
                return $this->render('alerta_lim_almuerzo', 
                    ['model' => $model,]  );

            }
            else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->idAlmuerzo]);
            }
            
            //return $this->redirect(['view', 'id' => $model->idAlmuerzo]);
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
