<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property integer $idubicacion
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $lugar
 * @property string $fecha
 * @property integer $evento_idevento
 *
 * @property Evento $eventoIdevento
 * @property Evento $cupos_disponibles
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_inicio', 'hora_fin', 'lugar', 'evento_idevento', 'limite_cupos'], 'required'],
            [['idubicacion', 'evento_idevento', 'limite_cupos'], 'integer'],
            [['hora_inicio', 'hora_fin', 'fecha'], 'safe'],
            [['lugar'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idubicacion' => 'ID Ubicación',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'lugar' => 'Lugar',
            'fecha' => 'Fecha',
            'evento_idevento' => 'Evento',
            'limite_cupos' => 'Limite de cupos',
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
    * Se encarga de crear una cadena compuesta por el nombre del evento, la ubicación, la fecha y horarios
    * Esta funcion se llama desde formulario de creación de inscripciones _form.php
    * @return la cadena
    */
    public function getEventoUbicacion(){
        $idEvento= $this->evento_idevento;
        $modeloConsulta = Evento::find()
                            ->where('idevento = :idEvento', [':idEvento' => $idEvento])
                            ->one();

        $eventoName = (string) $modeloConsulta->nombre;//casting ya que recibe un objeto

        return $this->lugar. '  Fecha: '.$this->fecha.' Hora: ['. $this->hora_inicio .' - '.$this->hora_fin.']  Evento: '.$eventoName;
    }


    /**
    * Consultar la cantidad de cupos disponibles para la ubicación del evento
    * @return cantidad de cupos disponbles
    */
    /*public function getCuposDisponibles(){
        $idUbicacion = $this->idubicacion;
        $cantidadOcupados = PersonaUbicacion::find()
                    ->where('ubicacion_idubicacion = :idUbicacion', [':idUbicacion' => $idUbicacion])
                    ->orderBy('ubicacion_idubicacion')
                    ->count();

        
        return $this->limite_cupos - $cantidadOcupados;


    }*/


}
