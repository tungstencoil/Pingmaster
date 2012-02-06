<?php

/**
 * This is the model class for table "services".
 *
 * The followings are the available columns in table 'services':
 * @property integer $idServices
 * @property integer $customerId
 * @property integer $serviceDefinitionId
 * @property integer $active
 * @property integer $typeId
 *
 * The followings are the available model relations:
 * @property Pingsurvey[] $pingsurveys
 * @property Customer $customer
 * @property Servicedefinitions $serviceDefinition
 * @property Type $type
 * @property Surveyresultdescriptions[] $surveyresultdescriptions
 */
class Services extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Services the static model class
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
		return 'services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customerId, serviceDefinitionId, active, typeId', 'required'),
			array('customerId, serviceDefinitionId, active, typeId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idServices, customerId, serviceDefinitionId, active, typeId', 'safe', 'on'=>'search'),
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
			'pingsurveys' => array(self::HAS_MANY, 'Pingsurvey', 'servicesId'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customerId'),
			'serviceDefinition' => array(self::BELONGS_TO, 'Servicedefinitions', 'serviceDefinitionId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
			'surveyresultdescriptions' => array(self::HAS_MANY, 'Surveyresultdescriptions', 'serviceId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServices' => 'Id Services',
			'customerId' => 'Customer',
			'serviceDefinitionId' => 'Service Definition',
			'active' => 'Active',
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

		$criteria->compare('idServices',$this->idServices);
		$criteria->compare('customerId',$this->customerId);
		$criteria->compare('serviceDefinitionId',$this->serviceDefinitionId);
		$criteria->compare('active',$this->active);
		$criteria->compare('typeId',$this->typeId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}