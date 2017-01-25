<?php

/**
 * This is the model class for table "inscripciones_proyectos".
 *
 * The followings are the available columns in table 'inscripciones_proyectos':
 * @property integer $id
 * @property string $nombre
 * @property string $email
 * @property string $telefono
 * @property string $tipo
 * @property string $categoria
 * @property string $ciudad
 * @property string $departamento
 * @property string $pais
 * @property string $descripcion
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property InscripcionesIntegrantes[] $inscripcionesIntegrantes
 */
class InscripcionesProyectos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inscripciones_proyectos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, email, telefono, tipo, categoria, ciudad, departamento, pais, descripcion', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			array('email, ciudad, departamento, pais', 'length', 'max'=>155),
			array('telefono, tipo, categoria', 'length', 'max'=>65),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, email, telefono, tipo, categoria, ciudad, departamento, pais, descripcion, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inscripcionesIntegrantes' => array(self::HAS_MANY, 'InscripcionesIntegrantes', 'proyecto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'telefono' => 'Telefono',
			'tipo' => 'Tipo',
			'categoria' => 'Categoria',
			'ciudad' => 'Ciudad',
			'departamento' => 'Departamento',
			'pais' => 'Pais',
			'descripcion' => 'Descripcion',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InscripcionesProyectos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
