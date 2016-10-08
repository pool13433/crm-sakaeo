<?php

class SiteController extends Controller {

    public function actionWelcome() {
        $member = Yii::app()->session['member'];
        $point = $member['point'];
        $giftsAll = Gift::model()->findAll(array(
            'order' => 'gift_point DESC'
        ));
        //'gift_point <=:point', array(':point' => $point)
        $giftsByPoint = Gift::model()->findAll(array(
            'condition' => 'gift_point <=:point',
            'params' => array(':point' => $point),
            'order' => 'gift_point DESC'
        ));
        $this->render('/site/welcome', array(
            'giftAll' => $giftsAll,
            'giftByPoint' => $giftsByPoint
        ));
    }

    public function actionProduct() {
        $products = Product::model()->findAllByAttributes(array('prod_promote' => 'active'));
        $this->render('/site/welcome-product', array(
            'products' => $products
        ));
    }

    public function actionCartReward() {
        $carts = Yii::app()->session['cart'];
        if (!is_array($carts)) {
            $carts = array();
        }
        $this->render('/site/cart-rewards', array(
            'carts' => $carts
        ));
    }
    
    public function actionCartConfirm(){
        $this->render('/site/cart-confirm',array(
            
        ));
    }

    public function actionAddRewardItem($id) {
        $carts = Yii::app()->session['cart'];
        if (!is_array($carts)) {
            $carts = array();
        }
        $gift = Gift::model()->findByPk($id);
        $carts[] = $gift;
        Yii::app()->session['cart'] = $carts;
        $this->redirect(array('/site/CartReward'));
    }

    public function actionRemoveRewardItem($id) {
        $carts = Yii::app()->session['cart'];
        if (!is_array($carts)) {
            $carts = array();
        }
        unset($carts[$id]);
        Yii::app()->session['cart'] = $carts;
        $this->redirect(array('/site/CartReward'));
    }

    public function actionReward() {
        $point = Yii::app()->session['member']['point'];

        $criteria = new CDbCriteria();
        $name = $type = '';

        if (!empty($_POST)) {

            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
                $criteria->compare('gift_name', $name, true, 'OR');
            }
            if (!empty($_POST['type'])) {
                $type = $_POST['type'];
                $criteria->compare('type_id', $type, true, 'OR');
            }
            if (!empty($point)) {
                //$criteria->addCondition('gift_point <= ' . $point, 'AND');
            }
        }
        $gifts = Gift::model()->findAll($criteria);
        $type = GiftType::model()->findAll();

        $cri = array(
            'name' => $name,
            'type' => $type
        );

        $this->render('/site/welcome-reward', array(
            'criteria' => $cri,
            'gifts' => $gifts,
            'type' => $type
        ));
    }

    public function actionIndex($id = null) {
        if (empty($id)) {
            $this->render('/exception/exception', array(
                'response' => array(
                    'title' => 'เกิดข้อผิดพลาด',
                    'message' => 'ไม่พบข้อมูล serial ที่ส่งมา'
                )
            ));
        } else {
            $profile = Yii::app()->db->createCommand()
                    ->select(' p.*
                                ,(
                                        (
                                        SELECT SUM(tb.buy_point)
                                        FROM tran_buy tb
                                        WHERE tb.per_id = p.per_id
                                        ) -
                                        (
                                            SELECT SUM(ts.swop_point)
                                            FROM tran_swop ts
                                            WHERE ts.per_id = p.per_id
                                        )      
                                ) as cal_points
                                ,(
                                     (
                                        SELECT COUNT(tb.buy_id)
                                        FROM tran_buy tb
                                        WHERE tb.per_id = p.per_id
                                        ) + 
                                        (
                                            SELECT COUNT(ts.swop_id)
                                            FROM tran_swop ts
                                            WHERE ts.per_id = p.per_id
                                        )   
                                ) as cal_tran
                                ,(
                                    SELECT 
                                        SUM(s.swop_number)
                                     FROM tran_swop s
                                     WHERE s.per_id = p.per_id
                                ) as cal_gift ')
                    ->from('person p')
                    ->where('per_serial =:serial', array(':serial' => $id))
                    ->queryRow();

            $this->render('/index', array(
                'serialCode' => $id,
                'person' => $profile
            ));
        }
    }

    public function actionPoints($id) {

        $profilePoints = Yii::app()->db->createCommand()
                ->select('i.*,
                 per.*,
                pro.*,
                DATE_FORMAT(tran_date,\'%d-%m-%Y\') as date_points,
                ROUND((pro.pro_price/t.type_min_price)* t.type_points,0) as cal_points,
                (CASE tran_status
                    WHEN 1 THEN \'<label class=\"label label-success\">ชำระเงินเรียบร้อย</label>\'
                    WHEN 2 THEN \'<label class=\"label label-danger\">ค้างชำระ</label>\'
                    ELSE \'<label class=\"label label-warning\">อื่น</label>\'
                END ) as tran_status')
                ->from('transaction i')
                ->join('person per', 'per.per_id = i.per_id')
                ->join('product pro', 'pro.pro_id = i.pro_id')
                ->leftJoin('type t', 't.type_id = pro.type_id')
                ->where('per.per_serial =:serial', array(':serial' => $id))
                ->order('tran_date DESC')
                ->queryAll();


        $this->render('user-points', array(
            'serialCode' => $id,
            'profile' => $this->getUserProfile($id),
            'profilePoints' => $profilePoints
        ));
    }

    public function actionTransactions($id) {

        $tranBuys = Yii::app()->db->createCommand()
                ->select('
                            tb.*,
                            per.*,
                            pro.*,
                            t.*,
                            s.*
                        ')
                ->from('tran_buy tb ')
                ->join('person per', 'per.per_id = tb.per_id')
                ->join('product pro', 'pro.prod_id = tb.prod_id')
                ->join('type t', 't.type_id = pro.type_id')
                ->join('store s', 's.store_id = pro.type_id')
                ->where('per.per_serial =:serial', array(':serial' => $id))
                ->order('tb.buy_date DESC')
                ->queryAll();


        $this->render('user-transactions', array(
            'serialCode' => $id,
            'profile' => $this->getUserProfile($id),
            'tranBuys' => $tranBuys,
        ));
    }

    public function actionGifts($id) {

        $profileGifts = Yii::app()->db->createCommand()
                ->select('
                        ts.*
                        ,p.*
                        ,g.*
                        ')
                ->from('tran_swop ts')
                ->join('person p', 'p.per_id = ts.per_id')
                ->join('gift g', 'g.gift_id = ts.gift_id')
                ->where('p.per_serial =:serial', array(':serial' => $id))
                ->order('ts.swop_date DESC')
                ->queryAll();


        $this->render('user-gifts', array(
            'serialCode' => $id,
            'profile' => $this->getUserProfile($id),
            'profileGifts' => $profileGifts
        ));
    }

    public function actionLogin() {
        $this->render('/login', array());
    }

    public function actionLogout() {
        unset(YII::app()->session['member']);
        $this->redirect(array('/site/welcome'));
    }

    private function getUserProfile($id) {
        return Yii::app()->db->createCommand()
                        ->select(' CONCAT(per_fname,\'  \',per_lname) as name ')
                        ->from('person')
                        ->where('per_serial =:serial ', array(':serial' => $id))
                        ->queryRow();
    }

    private function findReward($param, $point = null) {

        return array(
            'criteria' => $cri,
            'gifts' => $gifts,
            'type' => $type
        );
    }

}
