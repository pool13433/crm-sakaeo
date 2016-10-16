<?php

class PromotionController extends Controller {

    public function actionPromotionType() {

        $promotionTypes = Yii::app()->db->createCommand()
                ->select("p.*,
                                    DATE_FORMAT(p.type_date,'%d-%m-%Y') type_date ,
                                (CASE p.type_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   type_status
                ")
                ->from('promotion_type p')
                ->queryAll();

        $this->render('/promotion/promotion_type', array(
            'promotionType' => $promotionTypes,
        ));
    }

    public function actionFormPromotionType($id = null) {
        if (empty($id)) {
            $promType = new PromotionType();
        } else {
            $promType = PromotionType::model()->findByPk($id);
        }
        $this->render('/promotion/promotion_type_form', array(
            'promType' => $promType
        ));
    }

    public function actionSavePromotionType() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['type_id'])) {
                $promType = new PromotionType();
            } else {
                $id = $form['type_id'];
                $promType = PromotionType::model()->findByPk($id);
            }
            $promType->type_code = $form['type_code'];
            $promType->type_name = $form['type_name'];
            $promType->type_detail = $form['type_detail'];
            $promType->type_status = $form['type_status'];
            $promType->type_date = new CDbExpression('NOW()');
            if ($promType->save()) {
                $this->redirect(array('PromotionType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeletePromotionType($id) {
        if (!empty($id)) {
            if (PromotionType::model()->deleteByPk($id)) {
                $this->redirect(array('PromotionType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionPromotion() {
        $promotions = Yii::app()->db->createCommand()
                ->select("p.*,
                            DATE_FORMAT(p.prom_startdate,'%d-%m-%Y') prom_startdate,
                            DATE_FORMAT(p.prom_enddate,'%d-%m-%Y') prom_enddate,
                            DATE_FORMAT(p.prom_date,'%d-%m-%Y') prom_date,
                            t.type_name,
                             (CASE p.prom_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   prom_status")
                ->from('promotion p')
                ->join('promotion_type t', 'p.type_id = t.type_id')
                ->queryAll();
        $this->render('/promotion/promotion', array(
            'promotion' => $promotions,
        ));
    }

    public function actionFormPromotion($id = null) {
        if (empty($id)) {
            $prom = new Promotion();
        } else {
            $prom = Promotion::model()->findByPk($id);
        }

        $promTypes = PromotionType::model()->findAll();

        $this->render('/promotion/promotion_form', array(
            'prom' => $prom,
            'promTypes' => $promTypes
        ));
    }

    public function actionSavePromotion() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            $values = array(
                ':code' => $form['prom_code'],
                ':name' => $form['prom_name'],
                ':detail' => $form['prom_detail'],
                ':type' => $form['type_id'],
                ':startdate' => $form['prom_startdate'],
                ':enddate' => $form['prom_enddate'],
                ':status' => $form['prom_status'],
            );
            if (empty($form['prom_id'])) {
                $sql = " INSERT INTO `promotion`(prom_code,`prom_name`, `prom_detail`,type_id, `prom_startdate`, `prom_enddate`, `prom_date`,prom_status)
                    VALUES (:code,:name,:detail,:type,STR_TO_DATE(:startdate,'%d/%m/%Y'),STR_TO_DATE(:enddate,'%d/%m/%Y'),NOW(),:status)";
            } else {
                $sql = "
                    UPDATE `promotion` SET
                      `prom_code`=:code,`prom_name`=:name,
                      `prom_detail`=:detail,type_id = :type,
                      `prom_startdate`=STR_TO_DATE(:startdate,'%d/%m/%Y'),
                      `prom_enddate`=STR_TO_DATE(:enddate,'%d/%m/%Y'),`prom_date`=NOW(),
                      prom_status =:status
                      WHERE `prom_id`= :id
                  ";
                $values[':id'] = $form['prom_id'];
            }
            $command = Yii::app()->db->createCommand($sql);            
            $command->bindValues($values);
            if ($command->execute()) {
                $this->redirect(array('Promotion'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeletePromotion($id) {
        if (!empty($id)) {
            if (Promotion::model()->deleteByPk($id)) {
                $this->redirect(array('Promotion'));
            } else {
                echo 'Error';
            }
        }
    }

}
