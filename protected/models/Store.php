<?php

/**
 * This is the model class for table "store".
 *
 * The followings are the available columns in table 'store':
 * @property integer $store_id
 * @property string $store_code
 * @property string $store_name
 * @property string $store_address
 * @property string $store_mobile
 * @property string $store_status
 * @property string $store_date
 */
class Store extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_code, store_name, store_address, store_mobile, store_status, store_date', 'required'),
			array('store_code, store_mobile', 'length', 'max'=>15),
			array('store_name', 'length', 'max'=>150),
			array('store_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('store_id, store_code, store_name, store_address, store_mobile, store_status, store_date', 'safe', 'on'=>'search'),
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
			'store_id' => 'Store',
			'store_code' => 'Store Code',
			'store_name' => 'Store Name',
			'store_address' => 'Store Address',
			'store_mobile' => 'Store Mobile',
			'store_status' => 'Store Status',
			'store_date' => 'Store Date',
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

		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('store_code',$this->store_code,true);
		$criteria->compare('store_name',$this->store_name,true);
		$criteria->compare('store_address',$this->store_address,true);
		$criteria->compare('store_mobile',$this->store_mobile,true);
		$criteria->compare('store_status',$this->store_status,true);
		$criteria->compare('store_date',$this->store_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Store the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
