<?php

/**
 * This is the model class for table "waterpoints_by_office".
 *
 * The followings are the available columns in table 'waterpoints_by_office':
 * @property string $OfficeName
 * @property string $NumOfWaterPoints
 */
class WaterpointsByOffice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WaterpointsByOffice the static model class
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
		return 'waterpoints_by_office';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OfficeName, NumOfWaterPoints', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('OfficeName, NumOfWaterPoints', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'OfficeName' => 'Office Name',
			'NumOfWaterPoints' => 'Number Of Waterpoints',
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

		$criteria->compare('OfficeName',$this->OfficeName,true);
		$criteria->compare('NumOfWaterPoints',$this->NumOfWaterPoints,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}