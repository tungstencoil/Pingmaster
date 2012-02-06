<?php

/**
 * This is the model class for table "pingsurveyresults".
 *
 * The followings are the available columns in table 'pingsurveyresults':
 * @property integer $idPingSurveyResults
 * @property string $timestamp
 * @property integer $resultId
 * @property integer $notified
 * @property integer $surveyResultDescriptionId
 * @property integer $typeId
 * @property integer $pingSurveyId
 *
 * The followings are the available model relations:
 * @property Pingsurveynotifications[] $pingsurveynotifications
 * @property Pingsurvey $pingSurvey
 * @property Pingsurveyreultdefinition $result
 * @property Surveyresultdescriptions $surveyResultDescription
 * @property Type $type
 */
class Pingsurveyresults extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pingsurveyresults the static model class
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
		return 'pingsurveyresults';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timestamp, resultId, notified, surveyResultDescriptionId, typeId, pingSurveyId', 'required'),
			array('resultId, notified, surveyResultDescriptionId, typeId, pingSurveyId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPingSurveyResults, timestamp, resultId, notified, surveyResultDescriptionId, typeId, pingSurveyId', 'safe', 'on'=>'search'),
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
			'pingsurveynotifications' => array(self::HAS_MANY, 'Pingsurveynotifications', 'resultId'),
			'pingSurvey' => array(self::BELONGS_TO, 'Pingsurvey', 'pingSurveyId'),
			'result' => array(self::BELONGS_TO, 'Pingsurveyreultdefinition', 'resultId'),
			'surveyResultDescription' => array(self::BELONGS_TO, 'Surveyresultdescriptions', 'surveyResultDescriptionId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPingSurveyResults' => 'Id Ping Survey Results',
			'timestamp' => 'Timestamp',
			'resultId' => 'Result',
			'notified' => 'Notified',
			'surveyResultDescriptionId' => 'Survey Result Description',
			'typeId' => 'Type',
			'pingSurveyId' => 'Ping Survey',
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

		$criteria->compare('idPingSurveyResults',$this->idPingSurveyResults);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('resultId',$this->resultId);
		$criteria->compare('notified',$this->notified);
		$criteria->compare('surveyResultDescriptionId',$this->surveyResultDescriptionId);
		$criteria->compare('typeId',$this->typeId);
		$criteria->compare('pingSurveyId',$this->pingSurveyId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}