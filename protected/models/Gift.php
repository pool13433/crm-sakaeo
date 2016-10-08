<?php

/**
 * This is the model class for table "gift".
 *
 * The followings are the available columns in table 'gift':
 * @property integer $gift_id
 * @property string $gift_code
 * @property string $gift_name
 * @property string $gift_date
 * @property integer $gift_no
 * @property integer $gift_point
 */
class Gift extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'gift';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gift_code, gift_name, gift_date, gift_no, gift_point, type_id', 'required'),
            array('gift_no, gift_point, type_id', 'numerical', 'integerOnly' => true),
            array('gift_code', 'length', 'max' => 15),
            array('gift_name', 'length', 'max' => 150),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('gift_id, gift_code, gift_name, gift_date, gift_no, gift_point, type_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'giftType' => array(self::BELONGS_TO, 'GiftType', 'type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'gift_id' => 'Gift',
            'gift_code' => 'Gift Code',
            'gift_name' => 'Gift Name',
            'gift_date' => 'Gift Date',
            'gift_no' => 'Gift No',
            'gift_point' => 'Gift Point',
            'type_id' => 'Gift Type'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('gift_id', $this->gift_id);
        $criteria->compare('gift_code', $this->gift_code, true);
        $criteria->compare('gift_name', $this->gift_name, true);
        $criteria->compare('gift_date', $this->gift_date, true);
        $criteria->compare('gift_no', $this->gift_no);
        $criteria->compare('gift_point', $this->gift_point);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Gift the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
