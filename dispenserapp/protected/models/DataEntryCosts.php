<?php

/**
 * This is the model class for table "mortocyle_database.data_entry_costs".
 *
 * The followings are the available columns in table 'mortocyle_database.data_entry_costs':
 * @property string $reg_no
 * @property string $service_date
 * @property string $oil_lubricant_type
 * @property double $oil_lubricant_quantity
 * @property double $oil_lubricant_total_cost
 * @property string $outsource_material
 * @property double $outsource_material_cost
 * @property double $outsource_labour_total_cost
 * @property string $description_of_ourtsource_work_performed
 * @property integer $odometer_reading
 * @property string $duration_week
 * @property integer $costyear
 * @property integer $analysisperiod
 * @property integer $cost_rec_id
 */
class DataEntryCosts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DataEntryCosts the static model class
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
		return 'mortocyle_database.data_entry_costs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('odometer_reading, costyear, analysisperiod', 'numerical', 'integerOnly'=>true),
			array('oil_lubricant_quantity, oil_lubricant_total_cost, outsource_material_cost, outsource_labour_total_cost', 'numerical'),
			array('reg_no, oil_lubricant_type, outsource_material, duration_week', 'length', 'max'=>255),
			array('service_date, description_of_ourtsource_work_performed', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reg_no, service_date, oil_lubricant_type, oil_lubricant_quantity, oil_lubricant_total_cost, outsource_material, outsource_material_cost, outsource_labour_total_cost, description_of_ourtsource_work_performed, odometer_reading, duration_week, costyear, analysisperiod, cost_rec_id', 'safe', 'on'=>'search'),
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
			'registrationNumber' => array(self::BELONGS_TO, 'Details', 'reg_no'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reg_no' => 'Reg No',
			'service_date' => 'Service Date',
			'oil_lubricant_type' => 'Oil Lubricant Type',
			'oil_lubricant_quantity' => 'Oil Lubricant Quantity',
			'oil_lubricant_total_cost' => 'Oil Lubricant Total Cost',
			'outsource_material' => 'Outsource Material',
			'outsource_material_cost' => 'Outsource Material Cost',
			'outsource_labour_total_cost' => 'Outsource Labour Total Cost',
			'description_of_ourtsource_work_performed' => 'Description Of Ourtsource Work Performed',
			'odometer_reading' => 'Odometer Reading',
			'duration_week' => 'Duration Week',
			'costyear' => 'Costyear',
			'analysisperiod' => 'Analysisperiod',
			'cost_rec_id' => 'Cost Rec',
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
		$criteria->compare('service_date',$this->service_date,true);
		$criteria->compare('oil_lubricant_type',$this->oil_lubricant_type,true);
		$criteria->compare('oil_lubricant_quantity',$this->oil_lubricant_quantity);
		$criteria->compare('oil_lubricant_total_cost',$this->oil_lubricant_total_cost);
		$criteria->compare('outsource_material',$this->outsource_material,true);
		$criteria->compare('outsource_material_cost',$this->outsource_material_cost);
		$criteria->compare('outsource_labour_total_cost',$this->outsource_labour_total_cost);
		$criteria->compare('description_of_ourtsource_work_performed',$this->description_of_ourtsource_work_performed,true);
		$criteria->compare('odometer_reading',$this->odometer_reading);
		$criteria->compare('duration_week',$this->duration_week,true);
		$criteria->compare('costyear',$this->costyear);
		$criteria->compare('analysisperiod',$this->analysisperiod);
		$criteria->compare('cost_rec_id',$this->cost_rec_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}