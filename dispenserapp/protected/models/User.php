<<<<<<< HEAD
<?php
<<<<<<< HEAD
=======
<?php
>>>>>>> parent of ae9b68a... server changes

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
<<<<<<< HEAD
=======

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
 * @property integer $user_id
 * @property string $username
 * @property string $email
 * @property string $role
 * @property string $password
<<<<<<< HEAD
=======
 * @property integer $user_id
 * @property string $username
 * @property string $email
 * @property string $openid_identity
 * @property string $session_id
 * @property boolean $loggedin
>>>>>>> parent of ae9b68a... server changes
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
<<<<<<< HEAD
=======
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
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('username, email, role', 'length', 'max'=>255),
			array('password', 'length', 'max'=>40),
<<<<<<< HEAD
=======
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('username, email, session_id', 'length', 'max'=>255),
			array('openid_identity', 'length', 'max'=>1024),
			array('loggedin', 'safe'),
>>>>>>> parent of ae9b68a... server changes
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
<<<<<<< HEAD
=======
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, username, email, role, password', 'safe', 'on'=>'search'),
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
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
			'user_id' => 'User',
			'username' => 'Username',
			'email' => 'Email',
			'role' => 'Role',
			'password' => 'Password',
<<<<<<< HEAD
=======
			'user_id' => 'User',
			'username' => 'Username',
			'email' => 'Email',
			
>>>>>>> parent of ae9b68a... server changes
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

<<<<<<< HEAD
=======
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

>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('password',$this->password,true);
<<<<<<< HEAD
=======
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		/*$criteria->compare('openid_identity',$this->openid_identity,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('loggedin',$this->loggedin);
		*/
>>>>>>> parent of ae9b68a... server changes

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
=======

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
}