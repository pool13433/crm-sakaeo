<?php

class ServiceController extends Controller {

    public function actionGetProducts($id = null) {
//        $criteria = new CDbCriteria();
//        if (!empty($id)) {
//            $criteria->compare('prod_name', $id, true);
//        }
//        
//        $products = Product::model()->findAll($criteria);
        $command = Yii::app()->db->createCommand()
                ->select()
                ->from('product p')
                ->join('type t', 't.type_id = p.type_id');
        if (!empty($id)) {
            $command->where('p.prod_name LIKE \'%:name%\' ', array(':name' => $id));
        }
        $products = $command->queryAll();
        echo CJSON::encode($products);
    }

    public function actionGetCustomer($id = null) {
        $this->layout = false;
        header('Content-type: application/json');
        $cusotmer = Person::model()->findByAttributes(array(
            'per_serial' => $id
        ));
//        if (!$cusotmer) {
//            echo CJavaScript::jsonEncode(array(
//                'status' => false
//            ));
//        }else{
//            echo CJavaScript::jsonEncode(array(
//                'status' => true,
//                'data' => $cusotmer
//            ));
//        }
        echo CJavaScript::jsonEncode($cusotmer);
        Yii::app()->end();
    }

    public function actionGetCustomers($id = null) {
        $this->layout = false;
        header('Content-type: application/json');
        $criteria = new CDbCriteria();
        if (!empty($id)) {
            $criteria->compare('per_serial', $id, true);
        }
        //$criteria->compare('per_status', 1);
        $products = Person::model()->findAll($criteria);

        echo CJavaScript::jsonEncode($products);
        Yii::app()->end();
    }

    public function actionCheckLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $memberType = $_POST['type'];
        if (empty($memberType)) {
            $attributes = array(
                'per_idcard' => $username,
                'per_serial' => $password,
            );
        } else if (!empty($memberType) && $memberType == true) {
            $attributes = array(
                'per_username' => $username,
                'per_password' => $password,
                'per_status' => 1
            );
        }
        $member = Person::model()->findByAttributes($attributes);

        if ($member) {
            $points = Yii::app()->db->createCommand()
                    ->select('(
                            (SELECT COALESCE( SUM( buy_point ) , 0 )  FROM tran_buy b WHERE  b.per_id = p.per_id)
                            -
                            (SELECT COALESCE( SUM( swop_point ) , 0 )  FROM tran_swop s WHERE  s.per_id = p.per_id)
                            ) as point')
                    ->from('person p')
                    ->where('p.per_id =:perId', array(':perId' => $member->per_id))
                    ->queryScalar();
            //var_dump($points);
            //exit();
            $perId = $member['per_id'];

            $memberPivilegeId = $member['priv_id'];

            $menuGroupId = Yii::app()->db->createCommand()
                    ->select(' mp.menu_group_id ')
                    ->from('menu_privilege mp')
                    ->where("mp.priv_status = 'active' and mp.priv_id =:privilegeId", array(
                        ':privilegeId' => $memberPivilegeId
                    ))
                    ->queryScalar();

            $menuList = array();
            $menus = Yii::app()->db->createCommand("
                        SELECT 
                            m.menu_id,m.menu_name,m.menu_href,menu_icon
                        FROM menu m
                        JOIN menu_sub ms ON ms.menu_id = m.menu_id
                        WHERE ms.sub_id IN ($menuGroupId)
                        AND menu_status = 'active' 
                        GROUP BY    m.menu_id,m.menu_name,m.menu_href,menu_icon
                        ORDER BY m.menu_seq ASC
                    ")
                    ->queryAll();
            
            foreach ($menus as $key => $menu) {
                $menuId = $menu['menu_id'];

                $menuUser = Yii::app()->db->createCommand("
                            SELECT ms.* 
                            FROM menu_sub ms
                            WHERE 
                                ms.menu_id = $menuId 
                                AND ms.sub_id IN ($menuGroupId)
                                AND ms.sub_status = 'active'    
                            ORDER BY ms.sub_seq ASC    
                    ")
                        ->queryAll();
                //var_dump($menuUser);
                //exit();
                $menu['subMenu'] = $menuUser;
                $menuList[] = $menu;
            }

            $authorization = array(
                'profile' => $member,
                'point' => ($points ? $points : 0),
                'menu' => $menuList
            );
            //var_dump($authorization['menu']);
            //exit();
            //unset(Yii::app()->session['member']);
            Yii::app()->session['member'] = $authorization;
            echo Response::jsonEncode(true, 'ลงชื่อสำเร็จ', 'ลงชื่อสำเร็จ', Yii::app()->baseUrl . '/site/welcome');
        } else {
            echo Response::jsonEncode(false, 'ไม่พบข้อมูลในระบบ', 'ไม่พบข้อมูลในระบบ');
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
                        if ($swop->save()) {
                            
                        }
                    }
                }
                unset(Yii::app()->session['cart']);
                echo Response::jsonEncode(true, 'ร้องรอแลกของรางวัลสำเร็จ ', 'ร้องรอแลกของรางวัลสำเร็จ กรุณารอเจ้าหน้าที่ตรวจสอบสถานะ แล้วจะแจ้งติดต่อท่านอีกครั้ง', Yii::app()->baseUrl . '/site/gifts/' . $profile['per_serial']);
            } else {
                echo Response::jsonEncode(false, 'เกิดข้อผิดพลาด ', 'เกิดข้อผิดพลาด', 'xxxxx');
            }
        } else {
            echo Response::jsonEncode(false, 'เกิดข้อผิดพลาด ', 'เกิดข้อผิดพลาด', 'xxxxx');
        }
    }

    public function actionSaveSales() {
        if (!empty($_POST)) {
            $customer = CJSON::decode($_POST['customer']);
            $prouductList = CJSON::decode($_POST['products']);
            if (is_array($prouductList)) {
                foreach ($prouductList as $index => $data) {
                    $sales = new TranBuy();
                    $sales->buy_by = 1;
                    $sales->buy_date = new CDbExpression('NOW()');
                    $sales->buy_desc = 'ซื้อสินค้า';
                    $sales->buy_number = $data['prod_number'];
                    $sales->buy_point = $data['type_points'];
                    $sales->buy_status = 1;
                    $sales->per_id = $customer['customerId'];
                    $sales->prod_id = $data['prod_id'];
                    $sales->store_id = $customer['storeId'];
                    $sales->save();
                }
                echo Response::jsonEncode(true, 'success', 'success', Yii::app()->baseUrl . '/site/points/' . $customer['customerSerial']);
            } else {
                echo Response::jsonEncode(false, 'fail', 'fail', Yii::app()->baseUrl . '/site/points/' . $customer['customerSerial']);
            }
        }
    }

    public function actionGetMenus() {
        $menu = Menu::model()->findAll();
        echo CJSON::encode($menu);
    }

    public function actionGetStores() {
        $stores = Store::model()->findAll(array(
            'order' => 'store_name DESC'
        ));
        echo CJSON::encode($stores);
    }
    
    public function actionGetPointTypes(){
        $pointTypes = PointType::model()->findAll();
        echo CJSON::encode($pointTypes);
    }

}
