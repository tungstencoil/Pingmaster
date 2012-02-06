<?php

/**
 * This is the model class for table "pingsurveynotifications".
 *
 * The followings are the available columns in table 'pingsurveynotifications':
 * @property integer $idPingSurveyNotifications
 * @property string $timestamp
 * @property integer $resultId
 *
 * The followings are the available model relations:
 * @property Pingsurveyresults $result
 */
class Pingsurveynotifications extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pingsurveynotifications the static model class
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
		return 'pingsurveynotifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPingSurveyNotifications, timestamp, resultId', 'required'),
			array('idPingSurveyNotifications, resultId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPingSurveyNotifications, timestamp, resultId', 'safe', 'on'=>'search'),
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
			'result' => array(self::BELONGS_TO, 'Pingsurveyresults', 'resultId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPingSurveyNotifications' => 'Id Ping Survey Notifications',
			'timestamp' => 'Timestamp',
			'resultId' => 'Result',
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

		$criteria->compare('idPingSurveyNotifications',$this->idPingSurveyNotifications);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('resultId',$this->resultId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}