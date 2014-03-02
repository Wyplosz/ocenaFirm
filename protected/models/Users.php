<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property string $name
 * @property string $surname
 * @property string $nickname
 * @property string $address
 * @property string $city
 * @property string $postal_code
 * @property integer $newsletter
 * @property string $password
 * @property integer $number_of_opinions
 * @property integer $number_of_companies
 * @property string $email
 * @property integer $activated
 * @property integer $penalty_points
 * @property integer $u_id
 */
class Users extends CActiveRecord
{
	public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nickname, password, password2, email', 'required'),
			array('newsletter', 'boolean'),
			array('nickname, email', 'unique'),
			array('email', 'email'),
			array('name', 'length', 'max'=>20),
			array('surname, nickname', 'length', 'max'=>40),
			array('address, city', 'length', 'max'=>60),
			array('postal_code', 'length', 'max'=>5),
			array('password, password2', 'length', 'max'=>32),
			array('password', 'compare', 'compareAttribute'=>'password2'),				
			array('email', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, surname, nickname, address, city, postal_code, newsletter, password, number_of_opinions, number_of_companies, email, activated, penalty_points, u_id', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'surname' => 'Surname',
			'nickname' => 'Nickname',
			'address' => 'Address',
			'city' => 'City',
			'postal_code' => 'Postal Code',
			'newsletter' => 'Newsletter',
			'password' => 'Password',
			'password2' => 'Repeat password',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('newsletter',$this->newsletter);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('number_of_opinions',$this->number_of_opinions);
		$criteria->compare('number_of_companies',$this->number_of_companies);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activated',$this->activated);
		$criteria->compare('penalty_points',$this->penalty_points);
		$criteria->compare('u_id',$this->u_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
