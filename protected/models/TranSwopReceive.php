<?php

/**
 * This is the model class for table "tran_swop_receive".
 *
 * The followings are the available columns in table 'tran_swop_receive':
 * @property integer $rec_id
 * @property integer $cust_id
 * @property string $cust_fname
 * @property string $cust_lname
 * @property string $cust_mobile
 * @property string $cust_address
 * @property integer $rec_type
 * @property integer $store_id
 * @property string $rec_date
 */
class TranSwopReceive extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tran_swop_receive';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cust_id, cust_fname, cust_lname, cust_mobile, cust_address, rec_type, store_id, rec_date', 'required'),
            array('cust_id, store_id', 'numerical', 'integerOnly' => true),
            array('cust_fname, cust_lname', 'length', 'max' => 50),
            array('cust_mobile', 'length', 'max' => 15),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rec_id, cust_id, cust_fname, cust_lname, cust_mobile, cust_address, rec_type, store_id, rec_date', 'safe', 'on' => 'search'),
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
            'rec_id' => 'Rec',
            'cust_id' => 'Cust',
            'cust_fname' => 'Cust Fname',
            'cust_lname' => 'Cust Lname',
            'cust_mobile' => 'Cust Mobile',
            'cust_address' => 'Cust Address',
            'rec_type' => 'Rec Type',
            'store_id' => 'Store',
            'rec_date' => 'Rec Date',
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

        $criteria->compare('rec_id', $this->rec_id);
        $criteria->compare('cust_id', $this->cust_id);
        $criteria->compare('cust_fname', $this->cust_fname, true);
        $criteria->compare('cust_lname', $this->cust_lname, true);
        $criteria->compare('cust_mobile', $this->cust_mobile, true);
        $criteria->compare('cust_address', $this->cust_address, true);
        $criteria->compare('rec_type', $this->rec_type);
        $criteria->compare('store_id', $this->store_id);
        $criteria->compare('rec_date', $this->rec_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TranSwopReceive the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
