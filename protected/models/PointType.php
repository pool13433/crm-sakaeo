<?php

/**
 * This is the model class for table "point_type".
 *
 * The followings are the available columns in table 'point_type':
 * @property integer $type_id
 * @property string $type_code
 * @property string $type_name
 * @property string $type_detail
 * @property string $type_date
 * @property string $label_begin
 * @property string $label_middle
 * @property string $label_end
 * @property string $type_status
 */
class PointType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'point_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_code, type_name, type_detail, type_date, type_status', 'required'),
			array('type_code', 'length', 'max'=>20),
			array('type_name', 'length', 'max'=>150),
			array('label_begin, label_middle, label_end', 'length', 'max'=>50),
			array('type_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type_id, type_code, type_name, type_detail, type_date, label_begin, label_middle, label_end, type_status', 'safe', 'on'=>'search'),
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
			'type_id' => 'Type',
			'type_code' => 'Type Code',
			'type_name' => 'Type Name',
			'type_detail' => 'Type Detail',
			'type_date' => 'Type Date',
			'label_begin' => 'Label Begin',
			'label_middle' => 'Label Middle',
			'label_end' => 'Label End',
			'type_status' => 'Type Status',
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

		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('type_code',$this->type_code,true);
		$criteria->compare('type_name',$this->type_name,true);
		$criteria->compare('type_detail',$this->type_detail,true);
		$criteria->compare('type_date',$this->type_date,true);
		$criteria->compare('label_begin',$this->label_begin,true);
		$criteria->compare('label_middle',$this->label_middle,true);
		$criteria->compare('label_end',$this->label_end,true);
		$criteria->compare('type_status',$this->type_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PointType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
