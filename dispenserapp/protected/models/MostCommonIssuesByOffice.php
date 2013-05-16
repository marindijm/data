<?php

/**
 * This is the model class for table "most_common_issues_by_office".
 *
 * The followings are the available columns in table 'most_common_issues_by_office':
 * @property string $Region
 * @property string $IssueType
 * @property string $Frequency
 */
class MostCommonIssuesByOffice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MostCommonIssuesByOffice the static model class
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
		return 'most_common_issues_by_office';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IssueType', 'length', 'max'=>255),
			array('Region, Frequency', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Region, IssueType, Frequency', 'safe', 'on'=>'search'),
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
			'Region' => 'Region',
			'IssueType' => 'Issue Type',
			'Frequency' => 'Frequency',
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

		$criteria->compare('Region',$this->Region,true);
		$criteria->compare('IssueType',$this->IssueType,true);
		$criteria->compare('Frequency',$this->Frequency,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}