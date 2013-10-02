<?php

/**
 * This is the model class for table "mortocyle_database.mortocycle_users".
 *
 * The followings are the available columns in table 'mortocyle_database.mortocycle_users':
 * @property integer $staff_id
 * @property string $staff_name
 * @property string $staff_location
 */
class MortocycleUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MortocycleUsers the static model class
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
		return 'mortocyle_database.mortocycle_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('staff_id', 'required'),
			array('staff_id', 'numerical', 'integerOnly'=>true),
			array('staff_name, staff_location', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('staff_id, staff_name, staff_location', 'safe', 'on'=>'search'),
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
			'staff_id' => 'Staff',
			'staff_name' => 'Staff Name',
			'staff_location' => 'Staff Location',
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

		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('staff_name',$this->staff_name,true);
		$criteria->compare('staff_location',$this->staff_location,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}