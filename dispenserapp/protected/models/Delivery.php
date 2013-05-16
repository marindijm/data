<?php

/**
 * This is the model class for table "delivery".
 *
 * The followings are the available columns in table 'delivery':
 * @property integer $delivery_id
 * @property integer $waterpoint_id
 * @property integer $staff_id
 * @property integer $delivery_plan_id
 * @property string $delivery_date
 * @property boolean $complete
 * @property integer $num_jerricans
 * @property string $person_delivered_to
 * @property integer $contact_person_delivered_to
 * @property string $title_person_delivered_to
 * @property double $chlorine_consumed
 * @property double $chlorine_in_stock
 * @property string $last_expiry_date
 *
 * The followings are the available model relations:
 * @property Waterpoints $waterpoint
 * @property Users $staff
 * @property DeliveryPlan $deliveryPlan
 */
class Delivery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Delivery the static model class
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
		return 'delivery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waterpoint_id, staff_id', 'required'),
			array('waterpoint_id, staff_id, delivery_plan_id, num_jerricans, contact_person_delivered_to', 'numerical', 'integerOnly'=>true),
			array('chlorine_consumed, chlorine_in_stock', 'numerical'),
			array('delivery_date, complete, person_delivered_to, title_person_delivered_to, last_expiry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('delivery_id, waterpoint_id, staff_id, delivery_plan_id, delivery_date, complete, num_jerricans, person_delivered_to, contact_person_delivered_to, title_person_delivered_to, chlorine_consumed, chlorine_in_stock, last_expiry_date', 'safe', 'on'=>'search'),
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
			'waterpoint' => array(self::BELONGS_TO, 'Waterpoints', 'waterpoint_id'),
			'staff' => array(self::BELONGS_TO, 'Users', 'staff_id'),
			'deliveryPlan' => array(self::BELONGS_TO, 'DeliveryPlan', 'delivery_plan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'delivery_id' => 'Delivery',
			'waterpoint_id' => 'Waterpoint',
			'staff_id' => 'Staff',
			'delivery_plan_id' => 'Delivery Plan',
			'delivery_date' => 'Delivery Date',
			'complete' => 'Complete',
			'num_jerricans' => 'Num Jerricans',
			'person_delivered_to' => 'Person Delivered To',
			'contact_person_delivered_to' => 'Contact Person Delivered To',
			'title_person_delivered_to' => 'Title Person Delivered To',
			'chlorine_consumed' => 'Chlorine Consumed',
			'chlorine_in_stock' => 'Chlorine In Stock',
			'last_expiry_date' => 'Last Expiry Date',
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

		$criteria->compare('delivery_id',$this->delivery_id);
		$criteria->compare('waterpoint_id',$this->waterpoint_id);
		$criteria->compare('staff_id',$this->staff_id);
		$criteria->compare('delivery_plan_id',$this->delivery_plan_id);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('complete',$this->complete);
		$criteria->compare('num_jerricans',$this->num_jerricans);
		$criteria->compare('person_delivered_to',$this->person_delivered_to,true);
		$criteria->compare('contact_person_delivered_to',$this->contact_person_delivered_to);
		$criteria->compare('title_person_delivered_to',$this->title_person_delivered_to,true);
		$criteria->compare('chlorine_consumed',$this->chlorine_consumed);
		$criteria->compare('chlorine_in_stock',$this->chlorine_in_stock);
		$criteria->compare('last_expiry_date',$this->last_expiry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}