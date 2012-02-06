<?php

/**
 * This is the model class for table "subscriptiondefinitions".
 *
 * The followings are the available columns in table 'subscriptiondefinitions':
 * @property integer $idSubscriptionDefinitions
 * @property string $name
 * @property string $cost
 * @property integer $recurrenceId
 * @property integer $typeId
 *
 * The followings are the available model relations:
 * @property Recurrencedefinitions $recurrence
 * @property Type $type
 * @property Subscriptions[] $subscriptions
 */
class Subscriptiondefinitions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subscriptiondefinitions the static model class
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
		return 'subscriptiondefinitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recurrenceId, typeId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('cost', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSubscriptionDefinitions, name, cost, recurrenceId, typeId', 'safe', 'on'=>'search'),
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
			'recurrence' => array(self::BELONGS_TO, 'Recurrencedefinitions', 'recurrenceId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
			'subscriptions' => array(self::HAS_MANY, 'Subscriptions', 'subscriptionDefinitionId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSubscriptionDefinitions' => 'Id Subscription Definitions',
			'name' => 'Name',
			'cost' => 'Cost',
			'recurrenceId' => 'Recurrence',
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

		$criteria->compare('idSubscriptionDefinitions',$this->idSubscriptionDefinitions);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('recurrenceId',$this->recurrenceId);
		$criteria->compare('typeId',$this->typeId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}