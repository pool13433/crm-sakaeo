<?php

/**
 * This is the model class for table "menu_sub".
 *
 * The followings are the available columns in table 'menu_sub':
 * @property integer $sub_id
 * @property string $sub_name
 * @property string $sub_desc
 * @property string $sub_href
 * @property string $sub_date
 * @property integer $sub_seq
 * @property string $sub_status
 * @property integer $menu_id
 */
class MenuSub extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
     var $checked = false;
    
    public function tableName() {
        return 'menu_sub';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sub_name, sub_desc, sub_href,sub_icon, sub_date, sub_seq, sub_status, menu_id', 'required'),
            array('sub_seq, menu_id', 'numerical', 'integerOnly' => true),
            array('sub_name, sub_href', 'length', 'max' => 100),
            array('sub_status', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('sub_id, sub_name, sub_desc, sub_href,sub_icon, sub_date, sub_seq, sub_status, menu_id', 'safe', 'on' => 'search'),
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
            'sub_id' => 'Sub',
            'sub_name' => 'Sub Name',
            'sub_desc' => 'Sub Desc',
            'sub_href' => 'Sub Href',
            'sub_icon' => 'Sub Icon',
            'sub_date' => 'Sub Date',
            'sub_seq' => 'Sub Seq',
            'sub_status' => 'Sub Active',
            'menu_id' => 'Menu',
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

        $criteria->compare('sub_id', $this->sub_id);
        $criteria->compare('sub_name', $this->sub_name, true);
        $criteria->compare('sub_desc', $this->sub_desc, true);
        $criteria->compare('sub_href', $this->sub_href, true);
        $criteria->compare('sub_icon', $this->sub_icon, true);
        $criteria->compare('sub_date', $this->sub_date, true);
        $criteria->compare('sub_seq', $this->sub_seq);
        $criteria->compare('sub_status', $this->sub_status, true);
        $criteria->compare('menu_id', $this->menu_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MenuSub the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
