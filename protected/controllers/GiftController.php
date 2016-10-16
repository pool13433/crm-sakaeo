<?php

class GiftController extends Controller {

    public function actionGift() {
        $gift = Yii::app()->db->createCommand()
                ->select("g.*,t.*,
                              (CASE g.gift_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   gift_status
                        ")
                ->from('gift g')
                ->join('gift_type t', 't.type_id = g.type_id')
                ->queryAll();

        $this->render('/gift/gift', array(
            'gift' => $gift
        ));
    }

    public function actionFormGift($id = null) {
        if (empty($id)) {
            $gift = new Gift();
        } else {
            $gift = Gift::model()->findByPk($id);
        }
        $giftTypes = GiftType::model()->findAll();
        $this->render('/gift/gift_form', array(
            'gift' => $gift,
            'giftTypes' => $giftTypes
        ));
    }

    public function actionSaveGift() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['gift_id'])) {
                $gift = new Gift();
            } else {
                $id = $form['gift_id'];
                $gift = Gift::model()->findByPk($id);
            }
            $gift->gift_name = $form['gift_name'];
            $gift->gift_code = $form['gift_code'];
            $gift->gift_date = new CDbExpression('NOW()');
            $gift->gift_no = $form['gift_no'];
            $gift->gift_point = $form['gift_point'];
            $gift->type_id = $form['type_id'];
            $gift->gift_status = $form['gift_status'];

            if ($gift->save()) {
                $this->redirect(array('Gift'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeleteGift($id) {
        if (!empty($id)) {
            if (Gift::model()->deleteByPk($id)) {
                $this->redirect(array('gift'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionGiftType() {

        $giftTypes = Yii::app()->db->createCommand()
                ->select("
                    t.*,
                     (CASE t.type_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   type_status
                 ")
                ->from('gift_type t')
                ->order('t.type_id ASC')
                ->queryAll();

        $this->render('/gift/gift_type', array(
            'giftType' => $giftTypes
        ));
    }

    public function actionFormGiftType($id = null) {
        if (empty($id)) {
            $type = new GiftType();
        } else {
            $type = GiftType::model()->findByPk($id);
        }
        $this->render('/gift/gift_type_form', array(
            'type' => $type
        ));
    }

    public function actionSaveGiftType() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['type_id'])) {
                $giftType = new GiftType();
            } else {
                $id = $form['type_id'];
                $giftType = GiftType::model()->findByPk($id);
            }
            $giftType->type_code = $form['type_code'];
            $giftType->type_name = $form['type_name'];
            $giftType->type_detail = $form['type_detail'];
            $giftType->type_date = new CDbExpression('NOW()');
            $giftType->type_image = 'xxxx';
            $giftType->type_status = $form['type_status'];

            if ($giftType->save()) {
                $this->redirect(array('GiftType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeleteGiftType($id) {
        if (!empty($id)) {
            if (GiftType::model()->deleteByPk($id)) {
                $this->redirect(array('giftType'));
            } else {
                echo 'Error';
            }
        }
    }

}
