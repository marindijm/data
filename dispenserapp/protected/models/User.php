<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $username
 * @property string $email
 * @property string $openid_identity
 * @property string $session_id
 * @property boolean $loggedin
 *
 * The followings are the available model relations:
 * @property Issue[] $issues
 * @property Issue[] $issues1
 * @property Issue[] $issues2
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('username, email, session_id', 'length', 'max'=>255),
			array('openid_identity', 'length', 'max'=>1024),
			array('loggedin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('user_id, username, email, openid_identity, session_id, loggedin', 'safe', 'on'=>'search'),
			array('user_id, username, email', 'safe', 'on'=>'search'),
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
			'issues' => array(self::HAS_MANY, 'Issue', 'createdby'),
			'issues1' => array(self::HAS_MANY, 'Issue', 'resolvedby'),
			'issues2' => array(self::HAS_MANY, 'Issue', 'user_assigned'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'username' => 'Username',
			'email' => 'Email',
			'openid_identity' => 'Openid Identity',
			'session_id' => 'Session',
			'loggedin' => 'Loggedin',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		/*$criteria->compare('openid_identity',$this->openid_identity,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('loggedin',$this->loggedin);
		*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}