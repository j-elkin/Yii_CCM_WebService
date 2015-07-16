<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "memoria".
 *
 * @property integer $idmemoria
 * @property string $nombre
 * @property string $descripcion
 * @property resource $archivo
 * @property integer $evento_idevento
 *
 * @property Evento $eventoIdevento
 */
class Memoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $archivo_memoria;
    public static function tableName()
    {
        return 'memoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        /* return [
             [['nombre', 'archivo', 'evento_idevento', 'archivo_memoria'], 'required'],
             [['idmemoria', 'evento_idevento'], 'integer'],
             [['archivo'], 'string'],
             [['archivo_memoria'], 'file', 'extensions' => 'pdf'],
             [['nombre', 'descripcion'], 'string', 'max' => 45]
         ];*/

        // A continuación lo que se hace es definir escenarios para aplicar las reglas.
        // Esto se tuvo que hacer, porque el campo de archivo para la tabla memoria es obligatorio
        // entonces para cuando se crea una memoria se exige que se cargue un archivo desde el formulario
        // pero para cuando se actualice una memoria se tiene que quitar esta regla, pues puede que no se cambie el archivo
        return [
            [['nombre', 'archivo', 'evento_idevento', 'archivo_memoria'], 'required', 'on' => 'registro'],
            [['nombre', 'evento_idevento'], 'required', 'on' => 'actualiza'],
            [['idmemoria', 'evento_idevento'], 'integer'],
            [['archivo'], 'string'],
            [['archivo_memoria'], 'file', 'extensions' => 'pdf'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 1000]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmemoria' => 'ID Memoria',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'archivo' => 'Archivo',
            'evento_idevento' => 'Evento Idevento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdevento()
    {
        return $this->hasOne(Evento::className(), ['idevento' => 'evento_idevento']);
    }


    /**
    * Obtiene el archivo almacenado en el campo de la tabla memoria, para entregarlo con posiblidad de descargarlo
    * @return $file_memo el archivo en etiquera <a href> para ser descargado
    */
    //public function getArchivoMemoria($modelo){
    public function getArchivoMemoria(){
        $model = $this; //actualizando el modelo
        //$model=$modelo; //actualizando el modelo   -->   se hizo para generalizar, llamando desde view.php pero ya no funciono llamando desde index.php
               
        $file_memo = null;

        //$file_memo = Html::a($model->archivo, Yii::$app->urlManager->baseUrl . '/memorias/' . $model->archivo, [
        $file_memo = Html::a($model->archivo, Yii::$app->urlManager->baseUrl .'/download.php?filename='.$model->archivo, [
                'alt'=>Yii::t('app', 'Archivo memoria '),
                'title'=>Yii::t('app', 'Descargar memoria'),
            ]);

        
        return $file_memo;
    }

    /**
    * Borra un archivo de memoria del servidor
    */
    public function deleteArchivoMemoria(){
       //$image = Yii::$app->basePath . '/web/' . $this->codigo_qr;
        /*$memo = '../web/memorias/' . $this->archivo;
        if (unlink($memo)) {
            //$this->codigo_qr = null;
            //$this->save();
            return true;
        }
        return false;*/

        $respuesta = false;

        $ftp_server = "ftp.specializedti.com";
        $ftp_user_name = "jorendonro@specializedti.com";
        $ftp_user_pass = "fusion3249";
        $fileMemoria = "/ccm2015/web/memorias/".$this->archivo;
        // establecer conexión básica
        $conn_id = ftp_connect($ftp_server, 21) or die("Couldn't connect to $ftp_server"); 

        // iniciar sesión con nombre de usuario y contraseña
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        // intentar eliminar el archivo
        if (ftp_delete($conn_id, $fileMemoria)) {
            //echo "Se borro la imagen\n";
            $respuesta = true;
        } else {
            //echo "No se pudo borrar la imagen\n";
            $respuesta = false;
        }

        // cerrando la conección con el servidor ftp
        ftp_close($conn_id);

        return $respuesta;
    }

}
