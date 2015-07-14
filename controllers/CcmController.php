<?php

namespace app\controllers;

use Yii;
use app\models\Ccm;
use app\models\CcmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\User;
use app\components\AccessRule;

/**
 * CcmController implements the CRUD actions for Ccm model.
 */
class CcmController extends Controller
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
                         //permitido al usuario admin
                        'roles'=>[
                            User::ROLE_ADMIN,
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
     * Lists all Ccm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CcmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ccm model.
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
     * Creates a new Ccm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ccm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCCM]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ccm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCCM]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ccm model.
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
     * Finds the Ccm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ccm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ccm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
