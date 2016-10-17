<?php

class MenuController extends Controller {

    public function actionMenu() {
        $menus = Yii::app()->db->createCommand()
                ->select(" mp.*,
                            (CASE mp.priv_status 
                                WHEN 'active' THEN '<a class=\"ui olive label\">เปิดการใช้งาน</a>'
                                WHEN 'inactive' THEN '<a class=\"ui red label\">ปิดการใชงาน</a>'
                             END) as   priv_status
                        ")
                ->from('menu_privilege mp')
                ->order('mp.priv_name ASC')
                ->queryAll();
        $this->render('/menu/menu', array(
            'menus' => $menus
        ));
    }

    public function actionFormMenu($id = null) {
        $menus = Menu::model()->findAll();
        $menuPrivilege = MenuPrivilege::model()->findByPk($id);
        $menuList = array();
        if ($menus) {
            foreach ($menus as $index => $menu) {
                $subMenus = MenuSub::model()->findAllByAttributes(array(
                    'menu_id' => $menu['menu_id']
                ));
                if ($subMenus) {
                    if (!empty($id)) {
                        $subMenuList = array();
                        foreach ($subMenus as $index => $sub) {
                            //var_dump($menu);
                            $menu_ = Yii::app()->db->createCommand("
                            SELECT * FROM menu_privilege mp 
                             WHERE mp.priv_id = " . $id . " AND find_in_set('" . $sub['sub_id'] . "',mp.menu_group_id) <> 0 
                            ")
                                    ->queryRow();
                            if ($menu_) {
                                $sub['checked'] = true;
                            } else {
                                $sub['checked'] = false;
                            }
                            $subMenuList[] = $sub;
                        }
                        $menu['subMenu'] = $subMenuList;
                    } else {
                        $menu['subMenu'] = $subMenus;
                        $menuPrivilege = new MenuPrivilege();
                    }
                } else {
                    $subMenus = array();
                }
                $menuList[] = $menu;
            }
        } else {
            $menu = array();
        }
        //var_dump($menuList);
        //exit();
        $this->render('/menu/menu_form', array(
            'menus' => $menuList,
            'menuPrivilege' => $menuPrivilege
        ));
    }

    public function actionSaveMenu() {
        if (!empty($_POST)) {
            $menu_group_id = '';
            $form = $_POST['data'];
            $menus = array();

            if (!empty($_POST['menu'])) {
                $menus = $_POST['menu'];
                if (is_array($menus)) {
                    $menu_group_id = implode(',', $menus);
                }
            }
            if (empty($form['priv_id'])) {
                $menuProvilege = new MenuPrivilege();
            } else {
                $menuProvilege = MenuPrivilege::model()->findByPk($form['priv_id']);
            }
            $menuProvilege->menu_group_id = $menu_group_id;
            $menuProvilege->priv_desc = $form['priv_desc'];
            $menuProvilege->priv_status = $form['priv_status'];
            $menuProvilege->priv_name = $form['priv_name'];
            $menuProvilege->priv_date = new CDbExpression('NOW()');
            if ($menuProvilege->save()) {
                $this->redirect(array('Menu'));
            } else {
                echo 'Error';
            }
        }
    }

    public function actionDeleteMenu($id) {
        if (!empty($id)) {
            if (MenuPrivilege::model()->deleteByPk($id)) {
                $this->redirect(array('Menu'));
            } else {
                echo 'Error';
            }
        }
    }

}
