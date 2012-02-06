<?php

/**
 * This is the model class for table "surveyresultdescriptions".
 *
 * The followings are the available columns in table 'surveyresultdescriptions':
 * @property integer $idSurveyResultDescriptions
 * @property integer $serviceId
 * @property string $name
 * @property string $description
 * @property integer $active
 * @property integer $editable
 * @property string $typeId
 *
 * The followings are the available model relations:
 * @property Pingsurveyresults[] $pingsurveyresults
 * @property Services $service
 */
class Surveyresultdescriptions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Surveyresultdescriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'surveyresultdescriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSurveyResultDescriptions, serviceId, name, description, active, editable, typeId', 'required'),
			array('idSurveyResultDescriptions, serviceId, active, editable', 'numerical', 'integerOnly'=>true),
			array('name, typeId', 'length', 'max'=>45),
			array('description', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSurveyResultDescriptions, serviceId, name, description, active, editable, typeId', 'safe', 'on'=>'search'),
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
			'pingsurveyresults' => array(self::HAS_MANY, 'Pingsurveyresults', 'surveyResultDescriptionId'),
			'service' => array(self::BELONGS_TO, 'Services', 'serviceId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSurveyResultDescriptions' => 'Id Survey Result Descriptions',
			'serviceId' => 'Service',
			'name' => 'Name',
			'description' => 'Description',
			'active' => 'Active',
			'editable' => 'Editable',
			'typeId' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idSurveyResultDescriptions',$this->idSurveyResultDescriptions);
		$criteria->compare('serviceId',$this->serviceId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('editable',$this->editable);
		$criteria->compare('typeId',$this->typeId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}