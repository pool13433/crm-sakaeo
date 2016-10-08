<?php

/**
 * This is the model class for table "tran_swop".
 *
 * The followings are the available columns in table 'tran_swop':
 * @property integer $swop_id
 * @property integer $per_id
 * @property integer $gift_id
 * @property integer $swop_number
 * @property integer $swop_point
 * @property string $swop_desc
 * @property string $swop_date
 * @property integer $swop_status
 * @property integer $store_id
 * @property integer $swop_by
 */
class TranSwop extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tran_swop';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('per_id, gift_id, swop_number, swop_point, swop_desc, swop_date, swop_status, swop_by, rec_id', 'required'),
            array('per_id, gift_id, swop_number, swop_point, swop_status, swop_by, rec_id', 'numerical', 'integerOnly' => true),
            array('swop_desc', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('swop_id, per_id, gift_id, swop_number, swop_point, swop_desc, swop_date, swop_status, swop_by, rec_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'swop_id' => 'Swop',
            'per_id' => 'Per',
            'gift_id' => 'Gift',
            'swop_number' => 'Swop Number',
            'swop_point' => 'Swop Point',
            'swop_desc' => 'Swop Desc',
            'swop_date' => 'Swop Date',
            'swop_status' => 'Swop Status',
            'swop_by' => 'Swop By',
            'rec_id' => 'Receive Id'
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

        $criteria->compare('swop_id', $this->swop_id);
        $criteria->compare('per_id', $this->per_id);
        $criteria->compare('gift_id', $this->gift_id);
        $criteria->compare('swop_number', $this->swop_number);
        $criteria->compare('swop_point', $this->swop_point);
        $criteria->compare('swop_desc', $this->swop_desc, true);
        $criteria->compare('swop_date', $this->swop_date, true);
        $criteria->compare('swop_status', $this->swop_status);
        $criteria->compare('swop_by', $this->swop_by);
        $criteria->compare('rec_id', $this->rec_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TranSwop the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
