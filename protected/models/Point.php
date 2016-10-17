<?php

/**
 * This is the model class for table "point".
 *
 * The followings are the available columns in table 'point':
 * @property integer $point_id
 * @property string $point_code
 * @property string $point_detail
 * @property integer $point_typeid
 * @property integer $product_typeid
 * @property string $point_case
 * @property string $point_result
 * @property string $point_startdate
 * @property string $point_enddate
 * @property string $point_date
 * @property string $point_status
 */
class Point extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'point';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('point_code, point_detail, point_typeid, product_typeid, point_case, point_result, point_startdate, point_enddate, point_date, point_status', 'required'),
            //array('point_typeid, product_typeid', 'numerical', 'integerOnly' => true),
            array('point_code', 'length', 'max' => 20),
            array('point_case, point_result', 'length', 'max' => 30),
            array('point_status', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('point_id, point_code, point_detail, point_typeid, product_typeid, point_case, point_result, point_startdate, point_enddate, point_date, point_status', 'safe', 'on' => 'search'),
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
            'point_id' => 'Point',
            'point_code' => 'Point Code',
            'point_detail' => 'Point Detail',
            'point_typeid' => 'Point Typeid',
            'product_typeid' => 'Product Typeid',
            'point_case' => 'Point Case',
            'point_result' => 'Point Result',
            'point_startdate' => 'Point Startdate',
            'point_enddate' => 'Point Enddate',
            'point_date' => 'Point Date',
            'point_status' => 'Point Status',
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

        $criteria->compare('point_id', $this->point_id);
        $criteria->compare('point_code', $this->point_code, true);
        $criteria->compare('point_detail', $this->point_detail, true);
        $criteria->compare('point_typeid', $this->point_typeid);
        $criteria->compare('product_typeid', $this->product_typeid);
        $criteria->compare('point_case', $this->point_case, true);
        $criteria->compare('point_result', $this->point_result, true);
        $criteria->compare('point_startdate', $this->point_startdate, true);
        $criteria->compare('point_enddate', $this->point_enddate, true);
        $criteria->compare('point_date', $this->point_date, true);
        $criteria->compare('point_status', $this->point_status, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Point the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
