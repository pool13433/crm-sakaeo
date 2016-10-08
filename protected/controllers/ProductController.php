<?php

class ProductController extends Controller {

    public function actionProductType() {
        $prodType = Type::model()->findAll();

        $this->render('/product/product_type', array(
            'prodType' => $prodType
        ));
    }

    public function actionFormProductType($id = null) {
        if (empty($id)) {
            $type = new Type();
        } else {
            $type = Type::model()->findByPk($id);
        }
        $this->render('/product/product_type_form', array(
            'type' => $type
        ));
    }

    public function actionSaveProductType() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['type_id'])) {
                $prodType = new Type();
            } else {
                $id = $form['type_id'];
                $prodType = Type::model()->findByPk($id);
            }
            $prodType->type_name = $form['type_name'];
            $prodType->type_min_price = $form['type_min_price'];
            $prodType->type_date = new CDbExpression('NOW()');
            $prodType->type_points = $form['type_points'];

            if ($prodType->save()) {
                $this->redirect(array('ProductType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeleteProductType($id) {
        if (!empty($id)) {
            if (Type::model()->deleteByPk($id)) {
                $this->redirect(array('ProductType'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionProduct() {
        $product = Yii::app()->db->createCommand()
                ->select(' p.*,t.*')
                ->from('product p')
                ->join('type t', 't.type_id = p.type_id')
                ->queryAll();

        $this->render('/product/product', array(
            'product' => $product
        ));
    }
    
    public function actionFormProduct($id = null) {
        if (empty($id)) {
            $product = new Product();
        } else {
            $product = Product::model()->findByPk($id);
        }
        $prodTypes = Type::model()->findAll();
        $stores = Store::model()->findAll();
        $this->render('/product/product_form', array(
            'prod' => $product,
            'prodTypes' => $prodTypes,
            'stores' => $stores
        ));
    }
    
    public function actionSaveProduct() {
        if (!empty($_POST)) {
            $form = $_POST['data'];
            if (empty($form['prod_id'])) {
                $prod = new Product();
            } else {
                $id = $form['prod_id'];
                $prod = Product::model()->findByPk($id);
            }
            $prod->prod_name = $form['prod_name'];
            $prod->prod_code = $form['prod_code'];
            $prod->prod_date = new CDbExpression('NOW()');
            $prod->prod_price = $form['prod_price'];
            $prod->type_id = $form['type_id'];
            $prod->store_id = $form['store_id'];

            if ($prod->save()) {
                $this->redirect(array('Product'));
            } else {
                echo 'Error';
            }
        }
    }
    
    public function actionDeleteProduct($id) {
        if (!empty($id)) {
            if (Product::model()->deleteByPk($id)) {
                $this->redirect(array('Product'));
            } else {
                echo 'Error';
            }
        }
    }

}
