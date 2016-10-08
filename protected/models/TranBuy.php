<?php

/**
 * This is the model class for table "tran_buy".
 *
 * The followings are the available columns in table 'tran_buy':
 * @property integer $buy_id
 * @property integer $per_id
 * @property integer $prod_id
 * @property integer $buy_number
 * @property integer $buy_point
 * @property string $buy_desc
 * @property string $buy_date
 * @property integer $buy_by
 * @property integer $buy_status
 * @property integer $store_id
 */
class TranBuy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tran_buy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('per_id, prod_id, buy_number, buy_point, buy_desc, buy_date, buy_by, buy_status, store_id', 'required'),
			array('per_id, prod_id, buy_number, buy_point, buy_by, buy_status, store_id', 'numerical', 'integerOnly'=>true),
			array('buy_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('buy_id, per_id, prod_id, buy_number, buy_point, buy_desc, buy_date, buy_by, buy_status, store_id', 'safe', 'on'=>'search'),
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
			'buy_id' => 'Buy',
			'per_id' => 'Per',
			'prod_id' => 'Prod',
			'buy_number' => 'Buy Number',
			'buy_point' => 'Buy Point',
			'buy_desc' => 'Buy Desc',
			'buy_date' => 'Buy Date',
			'buy_by' => 'Buy By',
			'buy_status' => 'Buy Status',
			'store_id' => 'Store',
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

		$criteria->compare('buy_id',$this->buy_id);
		$criteria->compare('per_id',$this->per_id);
		$criteria->compare('prod_id',$this->prod_id);
		$criteria->compare('buy_number',$this->buy_number);
		$criteria->compare('buy_point',$this->buy_point);
		$criteria->compare('buy_desc',$this->buy_desc,true);
		$criteria->compare('buy_date',$this->buy_date,true);
		$criteria->compare('buy_by',$this->buy_by);
		$criteria->compare('buy_status',$this->buy_status);
		$criteria->compare('store_id',$this->store_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TranBuy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
