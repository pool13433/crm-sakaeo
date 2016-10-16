<?php

/**
 * This is the model class for table "promotion".
 *
 * The followings are the available columns in table 'promotion':
 * @property integer $prom_id
 * @property string $prom_name
 * @property string $prom_detail
 * @property integer $type_id
 * @property string $prom_startdate
 * @property string $prom_enddate
 * @property string $prom_date
 */
class Promotion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'promotion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('prom_code,prom_name, prom_detail, type_id, prom_startdate, prom_enddate, prom_date', 'required'),
            array('type_id', 'numerical', 'integerOnly' => true),
            array('prom_name', 'length', 'max' => 150),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prom_id,prom_code, prom_name, prom_detail, type_id, prom_startdate, prom_enddate, prom_date', 'safe', 'on' => 'search'),
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
            'prom_id' => 'Prom',
            'prom_code' => 'Prom Code',
            'prom_name' => 'Prom Name',
            'prom_detail' => 'Prom Detail',
            'type_id' => 'Type',
            'prom_startdate' => 'Prom Startdate',
            'prom_enddate' => 'Prom Enddate',
            'prom_date' => 'Prom Date',
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

        $criteria->compare('prom_id', $this->prom_id);
        $criteria->compare('prom_code', $this->prom_code, true);
        $criteria->compare('prom_name', $this->prom_name, true);
        $criteria->compare('prom_detail', $this->prom_detail, true);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('prom_startdate', $this->prom_startdate, true);
        $criteria->compare('prom_enddate', $this->prom_enddate, true);
        $criteria->compare('prom_date', $this->prom_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Promotion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function afterFind() {
        $this->prom_startdate = Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($this->prom_startdate));
        $this->prom_enddate = Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($this->prom_enddate));
        parent::afterFind();
    }
    
    protected function beforeSave() {
        //$this->prom_startdate =  Yii::app()->dateFormatter->format("yyyy-MM-dd",strtotime($this->prom_startdate));
        //$this->prom_enddate = Yii::app()->dateFormatter->format("yyyy-MM-dd",strtotime($this->prom_enddate));
        //$this->prom_startdate =date('Y-m-d', strtotime($this->prom_startdate));
        //$this->prom_enddate = date('Y-m-d', strtotime($this->prom_enddate));
        return parent::beforeSave();
    }


}
