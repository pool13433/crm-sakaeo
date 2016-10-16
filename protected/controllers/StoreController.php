<?php

class StoreController extends Controller {

    public function actionStore() {
        $stores = Yii::app()->db->createCommand()
                ->select("s.*,
                            (
                            CASE s.store_status 
                               WHEN 'active' THEN '<a class=\"ui green label\">เปิดการใช้งาน</a>'
                               WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                            END) as store_status
                        ")
                ->from('store s')
                ->order('s.store_name ASC')
                ->queryAll();
        $this->render('/store/store', array(
            'stores' => $stores
        ));
    }

    public function actionFormStore($id = null) {
        if (empty($id)) {
            $store = new Store();
        } else {
            $store = Store::model()->findByPk($id);
        }
        $this->render('/store/store_form', array(
            'store' => $store,
        ));
    }

    public function actionSaveStore() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['store_id'])) {
                $store = new Store();
            } else {
                $id = $form['store_id'];
                $store = Store::model()->findByPk($id);
            }
            $store->store_code = $form['store_code'];
            $store->store_name = $form['store_name'];
            $store->store_mobile = $form['store_mobile'];
            $store->store_status = $form['store_status'];
            $store->store_address = $form['store_address'];
            $store->store_date = new CDbExpression('NOW()');

            if ($store->save()) {
                $this->redirect(array('Store'));
            } else {
                echo 'Error';
            }
        }
    }
    
    public function actionDeleteStore($id) {
        if (!empty($id)) {
            if (Store::model()->deleteByPk($id)) {
                $this->redirect(array('Store'));
            } else {
                echo 'Error';
            }
        }
    }

}
