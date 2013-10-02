<?php

/**
 * This is the model class for table "mortocyle_database.details".
 *
 * The followings are the available columns in table 'mortocyle_database.details':
 * @property string $reg_no
 * @property string $dept
 * @property string $officebase_location
 * @property string $morto_desc_type
 * @property string $purch_date
 * @property double $purch_cost
 * @property integer $fuel_card_no
 * @property integer $staff_incharge1
 * @property integer $staff_incharge2
 * @property integer $staff_incharge3
 * @property string $engine_number
 * @property string $frame_number
 * @property string $log_book_number
 * @property string $insurance_provider
 * @property string $insurance_expiry_date
 */
class Details extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Details the static model class
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
		return 'mortocyle_database.details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reg_no', 'required'),
			array('fuel_card_no, staff_incharge1, staff_incharge2, staff_incharge3', 'numerical', 'integerOnly'=>true),
			array('purch_cost', 'numerical'),
			array('reg_no, dept, officebase_location, morto_desc_type', 'length', 'max'=>255),
			array('purch_date, engine_number, frame_number, log_book_number, insurance_provider, insurance_expiry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reg_no, dept, officebase_location, morto_desc_type, purch_date, purch_cost, fuel_card_no, staff_incharge1, staff_incharge2, staff_incharge3, engine_number, frame_number, log_book_number, insurance_provider, insurance_expiry_date', 'safe', 'on'=>'search'),
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
			'log' => array(self::HAS_MANY,'DataEntryLog','morto_reg_no'),
			'cost' => array(self::HAS_MANY,'DataEntryCosts','reg_no'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reg_no' => 'Reg No',
			'dept' => 'Dept',
			'officebase_location' => 'Officebase Location',
			'morto_desc_type' => 'Morto Desc Type',
			'purch_date' => 'Purch Date',
			'purch_cost' => 'Purch Cost',
			'fuel_card_no' => 'Fuel Card No',
			'staff_incharge1' => 'Staff Incharge1',
			'staff_incharge2' => 'Staff Incharge2',
			'staff_incharge3' => 'Staff Incharge3',
			'engine_number' => 'Engine Number',
			'frame_number' => 'Frame Number',
			'log_book_number' => 'Log Book Number',
			'insurance_provider' => 'Insurance Provider',
			'insurance_expiry_date' => 'Insurance Expiry Date',
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

		$criteria->compare('reg_no',$this->reg_no,true);
		$criteria->compare('dept',$this->dept,true);
		$criteria->compare('officebase_location',$this->officebase_location,true);
		$criteria->compare('morto_desc_type',$this->morto_desc_type,true);
		$criteria->compare('purch_date',$this->purch_date,true);
		$criteria->compare('purch_cost',$this->purch_cost);
		$criteria->compare('fuel_card_no',$this->fuel_card_no);
		$criteria->compare('staff_incharge1',$this->staff_incharge1);
		$criteria->compare('staff_incharge2',$this->staff_incharge2);
		$criteria->compare('staff_incharge3',$this->staff_incharge3);
		$criteria->compare('engine_number',$this->engine_number,true);
		$criteria->compare('frame_number',$this->frame_number,true);
		$criteria->compare('log_book_number',$this->log_book_number,true);
		$criteria->compare('insurance_provider',$this->insurance_provider,true);
		$criteria->compare('insurance_expiry_date',$this->insurance_expiry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}