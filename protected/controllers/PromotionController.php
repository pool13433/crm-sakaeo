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

    public function actionPointType() {
        $pointTypes = Yii::app()->db->createCommand()
                ->select("
                            pt.*,
                            DATE_FORMAT(pt.type_date,'%d-%m-%Y') as type_date,
                             (CASE pt.type_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   type_status
                        ")
                ->from('point_type pt')
                ->order('pt.type_id ASC')
                ->queryAll();
        $this->render('/promotion/point_type', array(
            'pointType' => $pointTypes
        ));
    }

    public function actionFormPointType($id = null) {
        if (empty($id)) {
            $type = new PointType();
        } else {
            $type = PointType::model()->findByPk($id);
        }
        $this->render('/promotion/point_type_form', array(
            'type' => $type,
        ));
    }

    public function actionSavePointType() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['type_id'])) {
                $type = new PointType();
            } else {
                $type = PointType::model()->findByPk($form['type_id']);
            }
            $type->type_code = $form['type_code'];
            $type->type_name = $form['type_name'];
            $type->type_detail = $form['type_detail'];
            $type->type_date = new CDbExpression('NOW()');
            $type->type_status = $form['type_status'];
            if ($type->save()) {
                $this->redirect(array('PointType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeletePointType($id) {
        if (!empty($id)) {
            if (PointType::model()->deleteByPk($id)) {
                $this->redirect(array('PointType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionPoint() {
        $points = Yii::app()->db->createCommand()
                ->select("
                    pt.type_name as point_type,
                    t.type_name as product_type,
                    CONCAT(pt.label_begin,'  ',p.point_case,'  ',pt.label_middle,'  ',p.point_result,'  ',pt.label_end) as point_condition,
                    p.point_id,p.point_detail,                    
                    DATE_FORMAT(p.point_startdate,'%d/%m/%Y') as point_startdate,
                    DATE_FORMAT(p.point_enddate,'%d/%m/%Y') as point_enddate,
                    DATE_FORMAT(p.point_date,'%d/%m/%Y') as point_date,
                     (CASE p.point_status 
                                    WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                                    WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                                 END) as   point_status
                 ")
                ->from('point p')
                ->join('type t', 't.type_id = p.product_typeid')
                ->join('point_type pt', 'pt.type_id = p.point_typeid')
                ->order('p.point_id ASC')
                ->queryAll();
        $this->render('/promotion/point', array(
            'point' => $points
        ));
    }

    public function actionFormPoint($id = null) {
        if (empty($id)) {
            $point = new Point();
        } else {
            $point = Yii::app()->db->createCommand()
                    ->select("
                            p.*,
                            DATE_FORMAT(p.point_startdate,'%d/%m/%Y') as point_startdate,
                             DATE_FORMAT(p.point_enddate,'%d/%m/%Y') as point_enddate
                            ")
                    ->from('point p')
                    ->where('p.point_id =:pointId', array(':pointId' => $id))
                    ->queryRow();
        }
        $pointType = PointType::model()->findAll();
        $productType = Type::model()->findAll();
        $this->render('/promotion/point_form', array(
            'point' => $point,
            'pointTypes' => $pointType,
            'productTypes' => $productType
        ));
    }

    public function actionSavePoint() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            //var_dump($form);
            //exit();

            $values = array(
                ':point_code' => $this->getPointMaxId() + 1,
                ':point_detail' => $form['point_detail'],
                ':point_typeid' => intval($form['point_typeid']),
                ':product_typeid' => intval($form['product_typeid']),
                ':point_case' => $form['point_case' . $form['point_typeid']],
                ':point_result' => $form['point_result' . $form['point_typeid']],
                ':point_startdate' => $form['point_startdate' . $form['point_typeid']],
                ':point_enddate' => $form['point_enddate' . $form['point_typeid']],
                ':point_status' => $form['point_status']
            );
            if (empty($form['point_id'])) {
                $sql = "INSERT INTO `point` 
                        (`point_code`, `point_detail`, `point_typeid`, 
                        `product_typeid`, `point_case`, `point_result`, `point_startdate`,
                        `point_enddate`, `point_date`, `point_status`) 
                        VALUES 
                        (:point_code,:point_detail,:point_typeid,
                        :product_typeid,:point_case,:point_result,STR_TO_DATE(:point_startdate,'%d/%m/%Y'),
                        STR_TO_DATE(:point_enddate,'%d/%m/%Y'),NOW(),:point_status)";
            } else {
                $sql = " UPDATE `point` SET 
                        `point_code`=:point_code,
                         `point_detail`=:point_detail,`point_typeid`=:point_typeid,
                         `product_typeid`=:product_typeid,`point_case`=:point_case,
                         `point_result`=:point_result,`point_startdate`=STR_TO_DATE(:point_startdate,'%d/%m/%Y'),
                         `point_enddate`=STR_TO_DATE(:point_enddate,'%d/%m/%Y'),`point_date`=NOW(),
                         `point_status`=:point_status
                         WHERE `point_id`=:point_id
                        ";
                $values[':point_id'] = $form['point_id'];
            }
            //var_dump($values);
            //exit();
            $command = Yii::app()->db->createCommand($sql);
            $command->bindValues($values);
            if ($command->execute()) {
                $this->redirect(array('point'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeletePoint($id) {
        if (!empty($id)) {
            if (Point::model()->deleteByPk($id)) {
                $this->redirect(array('Point'));
            } else {
                echo 'Error';
            }
        }
    }

    private function getPointMaxId() {
        $maxPointId = Yii::app()->db->createCommand()
                ->select('max(point_id) as max_point')
                ->from('point')
                ->queryScalar();
        if ($maxPointId) {
            return $maxPointId;
        } else {
            return 1;
        }
    }

}
