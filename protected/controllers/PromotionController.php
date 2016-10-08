<?php

class PromotionController extends Controller {

    public function actionPromotionType() {

        $promotionTypes = Yii::app()->db->createCommand()
                ->select('p.type_id,p.type_name,p.type_detail,
                                    DATE_FORMAT(p.type_date,\'%d-%m-%Y\') type_date ')
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
            $promType->type_name = $form['type_name'];
            $promType->type_detail = $form['type_detail'];
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
                ->select('p.prom_id,p.prom_name,p.prom_detail,
                            DATE_FORMAT(p.prom_startdate,\'%d-%m-%Y\') prom_startdate,
                            DATE_FORMAT(p.prom_enddate,\'%d-%m-%Y\') prom_enddate,
                            DATE_FORMAT(p.prom_date,\'%d-%m-%Y\') prom_date,
                            t.type_name ')
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
                ':name' => $form['prom_name'],
                ':detail' => $form['prom_detail'],
                ':type' => $form['type_id'],
                ':startdate' => $form['prom_startdate'],
                ':enddate' => $form['prom_enddate'],
            );
            if (empty($form['prom_id'])) {
                $sql = " INSERT INTO `promotion`(`prom_name`, `prom_detail`,type_id, `prom_startdate`, `prom_enddate`, `prom_date`)
                    VALUES (:name,:detail,:type,STR_TO_DATE(:startdate,'%d/%m/%Y'),STR_TO_DATE(:enddate,'%d/%m/%Y'),NOW())";
            } else {
                $sql = "
                    UPDATE `promotion` SET
                      `prom_name`=:name,
                      `prom_detail`=:detail,type_id = :type,
                      `prom_startdate`=STR_TO_DATE(:startdate,'%d/%m/%Y'),
                      `prom_enddate`=STR_TO_DATE(:enddate,'%d/%m/%Y'),`prom_date`=NOW()
                      WHERE `prom_id`= :id
                  ";
                $values[':id'] = $form['prom_id'];
            }
//            $prom->prom_name = $form['prom_name'];
//            $prom->prom_detail = $form['prom_detail'];
//            $prom->type_id = $form['type_id'];
//            $prom->prom_startdate = $form['prom_startdate'];
//            $prom->prom_enddate = $form['prom_enddate'];
//            $prom->prom_date = new CDbExpression('NOW()');


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
