<?php

/**
 * This is the model class for table "waterpoints".
 *
 * The followings are the available columns in table 'waterpoints':
 * @property integer $waterpoint_id
 * @property string $waterpoint_name
 * @property string $district_name
 * @property string $division_name
 * @property string $location_name
 * @property string $directions
 * @property string $promoter
 * @property string $promoter_contact_1
 * @property string $promoter_contact_2
 * @property string $assistant_promoter
 * @property string $assistant_promoter_contact_1
 * @property string $assistant_promoter_contact_2
 *
 * The followings are the available model relations:
 * @property Issue[] $issues
 */
class Waterpoint extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Waterpoint the static model class
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
		return 'waterpoints';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waterpoint_id', 'required'),
			array('waterpoint_id', 'numerical', 'integerOnly'=>true),
			array('waterpoint_name, district_name, division_name, location_name, promoter, promoter_contact_1, promoter_contact_2, assistant_promoter, assistant_promoter_contact_1, assistant_promoter_contact_2', 'length', 'max'=>255),
			array('directions', 'length', 'max'=>20000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('waterpoint_id, waterpoint_name, district_name, division_name, location_name, directions, promoter, promoter_contact_1, promoter_contact_2, assistant_promoter, assistant_promoter_contact_1, assistant_promoter_contact_2', 'safe', 'on'=>'search'),
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
			'issues' => array(self::HAS_MANY, 'Issue', 'waterpointid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'waterpoint_id' => 'Waterpoint',
			'waterpoint_name' => 'Waterpoint Name',
			'district_name' => 'District Name',
			'division_name' => 'Division Name',
			'location_name' => 'Location Name',
			'directions' => 'Directions',
			'promoter' => 'Promoter',
			'promoter_contact_1' => 'Promoter Contact 1',
			'promoter_contact_2' => 'Promoter Contact 2',
			'assistant_promoter' => 'Assistant Promoter',
			'assistant_promoter_contact_1' => 'Assistant Promoter Contact 1',
			'assistant_promoter_contact_2' => 'Assistant Promoter Contact 2',
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

		$criteria->compare('waterpoint_id',$this->waterpoint_id);
		$criteria->compare('waterpoint_name',$this->waterpoint_name,true);
		$criteria->compare('district_name',$this->district_name,true);
		$criteria->compare('division_name',$this->division_name,true);
		$criteria->compare('location_name',$this->location_name,true);
		$criteria->compare('directions',$this->directions,true);
		$criteria->compare('promoter',$this->promoter,true);
		$criteria->compare('promoter_contact_1',$this->promoter_contact_1,true);
		$criteria->compare('promoter_contact_2',$this->promoter_contact_2,true);
		$criteria->compare('assistant_promoter',$this->assistant_promoter,true);
		$criteria->compare('assistant_promoter_contact_1',$this->assistant_promoter_contact_1,true);
		$criteria->compare('assistant_promoter_contact_2',$this->assistant_promoter_contact_2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}