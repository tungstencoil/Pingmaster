<?php

/**
 * This is the model class for table "subscriptions".
 *
 * The followings are the available columns in table 'subscriptions':
 * @property integer $idSubscriptions
 * @property integer $customerId
 * @property integer $subscriptionDefinitionId
 * @property integer $active
 * @property integer $typeId
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Subscriptiondefinitions $subscriptionDefinition
 * @property Type $type
 */
class Subscriptions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subscriptions the static model class
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
		return 'subscriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customerId, subscriptionDefinitionId, active', 'required'),
			array('customerId, subscriptionDefinitionId, active, typeId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSubscriptions, customerId, subscriptionDefinitionId, active, typeId', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customerId'),
			'subscriptionDefinition' => array(self::BELONGS_TO, 'Subscriptiondefinitions', 'subscriptionDefinitionId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSubscriptions' => 'Id Subscriptions',
			'customerId' => 'Customer',
			'subscriptionDefinitionId' => 'Subscription Definition',
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

		$criteria->compare('idSubscriptions',$this->idSubscriptions);
		$criteria->compare('customerId',$this->customerId);
		$criteria->compare('subscriptionDefinitionId',$this->subscriptionDefinitionId);
		$criteria->compare('active',$this->active);
		$criteria->compare('typeId',$this->typeId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}