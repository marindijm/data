<?php

/**
 * This is the model class for table "most_common_issues".
 *
 * The followings are the available columns in table 'most_common_issues':
 * @property string $IssueType
 * @property string $frequency
 */
class MostCommonIssues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MostCommonIssues the static model class
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
		return 'most_common_issues';
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
			array('frequency', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IssueType, frequency', 'safe', 'on'=>'search'),
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
			'IssueType' => 'Issue Type',
			'frequency' => 'Frequency',
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

		$criteria->compare('IssueType',$this->IssueType,true);
		$criteria->compare('frequency',$this->frequency,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}