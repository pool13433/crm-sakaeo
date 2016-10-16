<?php

/**
 * This is the model class for table "menu_privilege".
 *
 * The followings are the available columns in table 'menu_privilege':
 * @property integer $priv_id
 * @property string $priv_name
 * @property string $priv_desc
 * @property string $priv_date
 * @property string $menu_group_id
 */
class MenuPrivilege extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu_privilege';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('priv_name, priv_desc, priv_date,priv_status', 'required'),
            array('priv_name', 'length', 'max' => 100),
            array('menu_group_id', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('priv_id, priv_name, priv_desc, priv_date, menu_group_id,priv_status', 'safe', 'on' => 'search'),
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
            'priv_id' => 'Priv',
            'priv_name' => 'Priv Name',
            'priv_desc' => 'Priv Desc',
            'priv_date' => 'Priv Date',
            'menu_group_id' => 'Menu Group',
            'priv_status' => 'Privilege Status'
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

        $criteria->compare('priv_id', $this->priv_id);
        $criteria->compare('priv_name', $this->priv_name, true);
        $criteria->compare('priv_desc', $this->priv_desc, true);
        $criteria->compare('priv_date', $this->priv_date, true);
        $criteria->compare('menu_group_id', $this->menu_group_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MenuPrivilege the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
