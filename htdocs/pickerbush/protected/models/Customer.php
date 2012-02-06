<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $idCustomer
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $joinDate
 * @property integer $active
 * @property integer $typeId
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Type $type
 * @property Services[] $services
 * @property Subscriptions[] $subscriptions
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customer the static model class
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
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, email', 'required'),
            array('active, typeId', 'numerical', 'integerOnly'=>true),
            array('email','email'),
            array('joinDate','default', 'value'=>new CDbExpression('NOW()'),
                   'setOnEmpty'=>false,'on'=>'insert'),
            array('firstName, lastName, email, password', 'length', 'max'=>45),
            array('active, typeId','default','value'=>'1'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCustomer, firstName, lastName, email, joinDate, active, typeId, password', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
			'services' => array(self::HAS_MANY, 'Services', 'customerId'),
			'subscriptions' => array(self::HAS_MANY, 'Subscriptions', 'customerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCustomer' => 'Id Customer',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'email' => 'Email',
			'joinDate' => 'Join Date',
			'active' => 'Active',
			'typeId' => 'Type',
			'password' => 'Password',
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

		$criteria->compare('idCustomer',$this->idCustomer);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('joinDate',$this->joinDate,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('typeId',$this->typeId);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
