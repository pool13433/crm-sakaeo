<?php

class ServiceController extends Controller {

    public function actionCheckLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $member = Person::model()->findByAttributes(array(
            'per_username' => $username,
            'per_password' => $password
        ));
        $points = Yii::app()->db->createCommand()
                ->select('(
                            (SELECT SUM(buy_point) FROM tran_buy b WHERE  b.per_id = p.per_id)
                            -
                            (SELECT SUM(swop_point) FROM tran_swop s WHERE  s.per_id = p.per_id)
                            ) as point')
                ->from('person p')
                ->where('p.per_id =:perId', array(':perId' => $member->per_id))
                ->queryScalar();
        //var_dump($points);
        //exit();
        $authorization = array(
            'profile' => $member,
            'point' => ($points ? $points : 0)
        );
        if ($member) {
            Yii::app()->session['member'] = $authorization;
            echo Response::jsonEncode(true, 'ลงชื่อสำเร็จ', 'ลงชื่อสำเร็จ', Yii::app()->baseUrl . '/site/index/' . $member->per_serial);
        } else {
            echo Response::jsonEncode(false, 'xxxx', 'xxxxx');
        }
    }

    public function actionConfirmCart() {
        if (!empty($_POST)) {
            $cart = Yii::app()->session['cart'];
            
            $member = Yii::app()->session['member'];
            $profile = $member['profile'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $addres = $_POST['address'];
            $mobile = $_POST['mobile'];
            $receiveType = $_POST['receive'];
            $store = $_POST['store'];

            $receive = new TranSwopReceive();
            $receive->cust_address = $addres;
            $receive->cust_fname = $fname;
            $receive->cust_id = $profile['per_id'];
            $receive->cust_lname = $lname;
            $receive->cust_mobile = $mobile;
            $receive->rec_date = new CDbExpression('NOW()');
            $receive->rec_type = $receiveType;
            $receive->store_id = $store;
            if ($receive->save()) {
                $recId = $receive->rec_id;

                if (is_array($cart)) {
                    foreach ($cart as $index => $item) {
                        $swop = new TranSwop();
                        $swop->per_id = $profile['per_id'];
                        $swop->gift_id = $item['gift_id'];
                        $swop->swop_by = -1;
                        $swop->swop_date = new CDbExpression('NOW()');
                        $swop->swop_desc = 'แลกสินค้า';
                        $swop->swop_number = 1;
                        $swop->swop_point = $item['gift_point'];
                        $swop->swop_status = 0;
                        $swop->rec_id = $recId;
                        if($swop->save()){
                            
                        }
                    }
                }
                unset(Yii::app()->session['cart']);
                echo Response::jsonEncode(true, 'OK ', 'ZZZZZZZZZZZZZZZZ', 'xxxxx');
            }else{
                echo  Response::jsonEncode(false, 'XXXXXXXXXXXXXXXXX ', 'XXXXXXXXXXX', 'xxxxx');
            }
        }else{
            echo Response::jsonEncode(false, 'OK ', 'YYYYYYYYYYYYY', 'xxxxx');
        }
    }

    public function actionGetStores() {
        $stores = Store::model()->findAll(array(
            'order' => 'store_name DESC'
        ));
        echo CJSON::encode($stores);
    }

}
