<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $prod_id
 * @property string $prod_code
 * @property string $prod_name
 * @property integer $prod_price
 * @property string $prod_date
 * @property integer $type_id
 *
 * The followings are the available model relations:
 * @property Transaction[] $transactions
 */
class Product extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('prod_code, prod_name, prod_price, prod_date,prod_status, prod_promote, type_id, store_id', 'required'),
            array('prod_price, type_id, store_id', 'numerical', 'integerOnly' => true),
            array('prod_code', 'length', 'max' => 20),
            array('prod_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prod_id, prod_code, prod_name, prod_price, prod_date,prod_status, prod_promote, type_id, store_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'transactions' => array(self::HAS_MANY, 'Transaction', 'pro_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'prod_id' => 'Prod',
            'prod_code' => 'Prod Code',
            'prod_name' => 'Prod Name',
            'prod_price' => 'Prod Price',
            'prod_date' => 'Prod Date',
            'type_id' => 'Type',
            'prod_status' => 'Product Status',
            'prod_promote' => 'Product Promotion',
            'store_id' => 'Stroe Id'
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

        $criteria->compare('prod_id', $this->prod_id);
        $criteria->compare('prod_code', $this->prod_code, true);
        $criteria->compare('prod_name', $this->prod_name, true);
        $criteria->compare('prod_price', $this->prod_price);
        $criteria->compare('prod_date', $this->prod_date, true);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('store_id', $this->store_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
