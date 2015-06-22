<?php

namespace app\models;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $docPersona
 * @property string $nombre
 * @property string $apellidos
 * @property string $genero
 * @property string $fecha_nacimiento
 * @property string $correo_electronico
 * @property string $telefono
 * @property resource $codigo_qr
 * @property integer $tipo_doc_idtipo_doc
 * @property integer $pais_procedencia_idpais_procedencia
 * @property integer $institucion_idinstitucion
 * @property integer $tipo_persona_idtipo_persona
 *
 * @property Almuerzo[] $almuerzos
 * @property PerEvt[] $perEvts
 * @property Evento[] $eventoIdeventos
 * @property Institucion $institucionIdinstitucion
 * @property PaisProcedencia $paisProcedenciaIdpaisProcedencia
 * @property TipoDoc $tipoDocIdtipoDoc
 * @property TipoPersona $tipoPersonaIdtipoPersona
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file_qr;
    //nombre del archivo generado en el servidor
    public $image_file;
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docPersona', 'nombre', 'apellidos', 'genero', 'fecha_nacimiento', 'correo_electronico', 'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'tipo_persona_idtipo_persona'], 'required'],
            [['docPersona', 'telefono', 'tipo_doc_idtipo_doc', 'pais_procedencia_idpais_procedencia', 'institucion_idinstitucion', 'tipo_persona_idtipo_persona'], 'integer'],
            [['correo_electronico'], 'email'],
            [['file_qr'], 'file', 'extensions'=>'jpg, gif, png'],
            [['codigo_qr'], 'string', 'max' => 100],
            [['nombre', 'apellidos', 'genero', 'fecha_nacimiento'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'docPersona' => 'Documento de Identidad',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'genero' => 'Género',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'correo_electronico' => 'Correo Electrónico',
            'telefono' => 'Teléfono',
            'codigo_qr' => 'Codigo QR',
            'tipo_doc_idtipo_doc' => 'Tipo de Documento',
            'pais_procedencia_idpais_procedencia' => 'País de Procedencia',
            'institucion_idinstitucion' => 'Institución',
            'tipo_persona_idtipo_persona' => 'Tipo Persona',
            'file_qr' => 'Código QR'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlmuerzos()
    {
        return $this->hasMany(Almuerzo::className(), ['persona_docPersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerEvts()
    {
        return $this->hasMany(PerEvt::className(), ['persona_idpersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdeventos()
    {
        return $this->hasMany(Evento::className(), ['idevento' => 'evento_idevento'])->viaTable('per_evt', ['persona_idpersona' => 'docPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitucionIdinstitucion()
    {
        return $this->hasOne(Institucion::className(), ['idinstitucion' => 'institucion_idinstitucion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaisProcedenciaIdpaisProcedencia()
    {
        return $this->hasOne(PaisProcedencia::className(), ['idpais_procedencia' => 'pais_procedencia_idpais_procedencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocIdtipoDoc()
    {
        return $this->hasOne(TipoDoc::className(), ['idtipo_doc' => 'tipo_doc_idtipo_doc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPersonaIdtipoPersona()
    {
        return $this->hasOne(TipoPersona::className(), ['idtipo_persona' => 'tipo_persona_idtipo_persona']);
    }


    const IMAGE_PLACEHOLDER = 'uploads/codigo_qr_question.jpg';
 
    public function getDisplayImage() {
        $model=$this;//Actualizando el modelo
        if (empty($model->codigo_qr)) {
            // if you do not want a placeholder
            $image = null;
     
            // else if you want to display a placeholder
            $image = Html::img(self::IMAGE_PLACEHOLDER, [
                'alt'=>Yii::t('app', 'No se dispone de QR'),
                'title'=>Yii::t('app', 'Sin asignar código QR'),
                //'class'=>'img-thumbnail'
                // add a CSS class to make your image styling consistent
            ]);
        }
        else {
           $image = Html::img(Yii::$app->urlManager->baseUrl . '/' . $model->codigo_qr, [
           //$image = Html::img($model->codigo_qr, [
                'alt'=>Yii::t('app', 'No existe el archivo de código QR para ') . $model->docPersona,
                'title'=>Yii::t('app', 'Código QR ').$model->docPersona,
                'width'=>'220',
                //'class'=>'img-thumbnail'
                // add a CSS class to make your image styling consistent
            ]);
        }
     
        // enclose in a container if you wish with appropriate styles
        return ($image == null) ? null : 
            //Html::tag('div', $image, ['class' => 'file-preview-frame']); 
            $image;
    }


    public function deleteImage() {
        //." basePath: ".Yii::$app->basePath."\web\uploads\\"
        $qr = $this->codigo_qr;

        //$image = Yii::$app->basePath . '/web/' . $this->codigo_qr;
        $image = '../web/' . $this->codigo_qr;
        if (unlink($image)) {
            //$this->codigo_qr = null;
            //$this->save();
            return true;
        }
        return false;
    }

}
