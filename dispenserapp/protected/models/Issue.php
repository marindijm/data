<?php 

/**
 * This is the model class for table "issue".
 *
 * The followings are the available columns in table 'issue':
 * @property integer $issueid
 * @property integer $waterpointid
 * @property string $date_created
 * @property boolean $status
 * @property integer $user_assigned
 * @property integer $issuetypeid
 * @property integer $issuesourceid
 * @property integer $createdby
 * @property integer $resolvedby
 * @property string $date_resolved
 * @property string $user_comment
 *
 * The followings are the available model relations:
 * @property Users $createdby0
 * @property Issuesource $issuesource
 * @property Issuetype $issuetype
 * @property Users $resolvedby0
 * @property Users $userAssigned
 * @property Waterpoints $waterpoint
 */
class Issue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Issue the static model class
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
		return 'issue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waterpointid', 'required'),
			array('waterpointid, user_assigned, issuetypeid, issuesourceid, createdby, resolvedby', 'numerical', 'integerOnly'=>true),
			array('date_created, status, date_resolved', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('issueid, waterpointid, date_created, status, user_assigned, issuetypeid, issuesourceid, createdby, resolvedby, date_resolved', 'safe', 'on'=>'search'),
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
			'createdby0' => array(self::BELONGS_TO, 'User', 'createdby'),
			'issuesource' => array(self::BELONGS_TO, 'Issuesource', 'issuesourceid'),
			'issuetype' => array(self::BELONGS_TO, 'Issuetype', 'issuetypeid'),
			'resolvedby0' => array(self::BELONGS_TO, 'User', 'resolvedby'),
			'userAssigned' => array(self::BELONGS_TO, 'User', 'user_assigned'),
			'waterpoint' => array(self::BELONGS_TO, 'Waterpoint', 'waterpointid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'issueid' => 'Issue ID',
			'waterpointid' => 'Waterpoint',
			'date_created' => 'Date Created',
			'status' => 'Resolved?',
			'user_assigned' => 'User Assigned',
			'issuetypeid' => 'Issue Type',
			'issuesourceid' => 'Issue Source',
			'createdby' => 'Created by',
			'resolvedby' => 'Resolved by',
			'date_resolved' => 'Date Resolved',
			'user_comment' => 'User Comment',
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

		$criteria->compare('issueid',$this->issueid);
		$criteria->compare('waterpointid',$this->waterpointid);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_assigned',$this->user_assigned);
		//$criteria->compare('issuetypeid',$this->issuetypeid);
		$criteria->compare('t.id',$this->issueid);
		$criteria->compare('issuetype.issuetypename',$this->issuetypeid, true);
		$criteria->compare('issuesourceid',$this->issuesourceid);
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('resolvedby',$this->resolvedby);
		$criteria->compare('date_resolved',$this->date_resolved,true);

		//load the related table at the same time:
		$criteria->with=array('issuetype');
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}