<?php

/**
 * This is the model class for table "pingsurvey".
 *
 * The followings are the available columns in table 'pingsurvey':
 * @property integer $idPingSurvey
 * @property integer $servicesId
 * @property string $ipAddress
 * @property string $contact
 * @property integer $typeId
 * @property integer $notifyOff
 * @property integer $notifyOn
 *
 * The followings are the available model relations:
 * @property Services $services
 * @property Type $type
 * @property Pingsurveyresults[] $pingsurveyresults
 */
class Pingsurvey extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pingsurvey the static model class
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
		return 'pingsurvey';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servicesId, ipAddress, contact, typeId, notifyOff, notifyOn', 'required'),
			array('servicesId, typeId, notifyOff, notifyOn', 'numerical', 'integerOnly'=>true),
			array('ipAddress, contact', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPingSurvey, servicesId, ipAddress, contact, typeId, notifyOff, notifyOn', 'safe', 'on'=>'search'),
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
			'services' => array(self::BELONGS_TO, 'Services', 'servicesId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
			'pingsurveyresults' => array(self::HAS_MANY, 'Pingsurveyresults', 'pingSurveyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPingSurvey' => 'Id Ping Survey',
			'servicesId' => 'Services',
			'ipAddress' => 'Ip Address',
			'contact' => 'Contact',
			'typeId' => 'Type',
			'notifyOff' => 'Notify Off',
			'notifyOn' => 'Notify On',
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

		$criteria->compare('idPingSurvey',$this->idPingSurvey);
		$criteria->compare('servicesId',$this->servicesId);
		$criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('typeId',$this->typeId);
		$criteria->compare('notifyOff',$this->notifyOff);
		$criteria->compare('notifyOn',$this->notifyOn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}