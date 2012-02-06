<?php

/**
 * This is the model class for table "type".
 *
 * The followings are the available columns in table 'type':
 * @property integer $idType
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 * @property Pingsurvey[] $pingsurveys
 * @property Pingsurveyresults[] $pingsurveyresults
 * @property Pingsurveyreultdefinition[] $pingsurveyreultdefinitions
 * @property Servicedefinitions[] $servicedefinitions
 * @property Services[] $services
 * @property Subscriptiondefinitions[] $subscriptiondefinitions
 * @property Subscriptions[] $subscriptions
 */
class Type extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Type the static model class
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
		return 'type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idType, description', 'safe', 'on'=>'search'),
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
			'customers' => array(self::HAS_MANY, 'Customer', 'typeId'),
			'pingsurveys' => array(self::HAS_MANY, 'Pingsurvey', 'typeId'),
			'pingsurveyresults' => array(self::HAS_MANY, 'Pingsurveyresults', 'typeId'),
			'pingsurveyreultdefinitions' => array(self::HAS_MANY, 'Pingsurveyreultdefinition', 'typeId'),
			'servicedefinitions' => array(self::HAS_MANY, 'Servicedefinitions', 'typeId'),
			'services' => array(self::HAS_MANY, 'Services', 'typeId'),
			'subscriptiondefinitions' => array(self::HAS_MANY, 'Subscriptiondefinitions', 'typeId'),
			'subscriptions' => array(self::HAS_MANY, 'Subscriptions', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idType' => 'Id Type',
			'description' => 'Description',
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

		$criteria->compare('idType',$this->idType);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}