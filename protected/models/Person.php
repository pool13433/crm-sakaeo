<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $per_id
 * @property string $per_serial
 * @property string $per_code
 * @property string $per_fname
 * @property string $per_lname
 * @property string $per_idcard
 * @property string $per_gender
 * @property string $per_email
 * @property string $per_mobile
 * @property string $per_address
 * @property string $per_birthday
 * @property integer $per_status
 */
class Person extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'person';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('per_serial, per_code, per_username, per_password, per_fname, per_lname, per_idcard, per_gender, per_email, per_mobile, per_address, per_birthday, per_status', 'required'),
            array('per_status', 'numerical', 'integerOnly' => true),
            array('per_serial', 'length', 'max' => 30),
            array('per_code', 'length', 'max' => 20),
            array('per_fname, per_lname', 'length', 'max' => 100),
            array('per_idcard, per_mobile', 'length', 'max' => 15),
            array('per_gender', 'length', 'max' => 1),
            array('per_email, per_username, per_password', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('per_id, per_serial, per_code,  per_username, per_password, per_fname, per_lname, per_idcard, per_gender, per_email, per_mobile, per_address, per_birthday, per_status,priv_id ', 'safe', 'on' => 'search'),
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
            'per_id' => 'Per',
            'per_serial' => 'Per Serial',
            'per_code' => 'Per Code',
            'per_username' => 'Username',
            'per_password' => 'Password',
            'per_fname' => 'Per Fname',
            'per_lname' => 'Per Lname',
            'per_idcard' => 'Per Idcard',
            'per_gender' => 'Per Gender',
            'per_email' => 'Per Email',
            'per_mobile' => 'Per Mobile',
            'per_address' => 'Per Address',
            'per_birthday' => 'Per Birthday',
            'per_status' => 'Per Status',      
            'priv_id' => 'Privilege Id',
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

        $criteria->compare('per_id', $this->per_id);
        $criteria->compare('per_serial', $this->per_serial, true);
        $criteria->compare('per_code', $this->per_code, true);
        $criteria->compare('per_fname', $this->per_fname, true);
        $criteria->compare('per_lname', $this->per_lname, true);
        $criteria->compare('per_idcard', $this->per_idcard, true);
        $criteria->compare('per_gender', $this->per_gender, true);
        $criteria->compare('per_email', $this->per_email, true);
        $criteria->compare('per_mobile', $this->per_mobile, true);
        $criteria->compare('per_address', $this->per_address, true);
        $criteria->compare('per_birthday', $this->per_birthday, true);
        $criteria->compare('per_status', $this->per_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Person the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
