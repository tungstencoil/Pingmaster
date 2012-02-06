<?php

/**
 * This is the model class for table "pingsurveyreultdefinition".
 *
 * The followings are the available columns in table 'pingsurveyreultdefinition':
 * @property integer $idPingSurveyReultDefinition
 * @property string $name
 * @property string $description
 * @property integer $typeId
 *
 * The followings are the available model relations:
 * @property Pingsurveyresults[] $pingsurveyresults
 * @property Type $type
 */
class Pingsurveyreultdefinition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pingsurveyreultdefinition the static model class
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
		return 'pingsurveyreultdefinition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeId', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPingSurveyReultDefinition, name, description, typeId', 'safe', 'on'=>'search'),
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
			'pingsurveyresults' => array(self::HAS_MANY, 'Pingsurveyresults', 'resultId'),
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPingSurveyReultDefinition' => 'Id Ping Survey Reult Definition',
			'name' => 'Name',
			'description' => 'Description',
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

		$criteria->compare('idPingSurveyReultDefinition',$this->idPingSurveyReultDefinition);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('typeId',$this->typeId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}