<?php

class PersonController extends Controller {

    public function actionRole() {

        $personRoles = Yii::app()->db->createCommand()
                ->select(" p.*, (select priv_desc from menu_privilege mp where mp.priv_id = p.priv_id ) as privilege
                          
                       ")                
                ->from('person p')
                ->order(' per_serial ASC')
                ->queryAll();

        $this->render('/person/role', array(
            'persons' => $personRoles
        ));
    }

    public function actionRoleInfo($id) {
        $person = Yii::app()->db->createCommand()
                ->select(" p.*
                         ,( CASE p.per_status
                                WHEN 1 THEN 'Administrator'
                                WHEN 2 THEN 'Customer'
                                END 
                             )   as per_status
                         ")
                ->from('person p')
                ->where('p.per_id =:perId', array(':perId' => $id))
                ->queryRow();
        $profiles = MenuPrivilege::model()->findAll();
        $this->render('/person/role_info', array(
            'profile' => $profiles,
            'person' => $person
        ));
    }

    public function actionSaveRole() {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $privilege = $_POST['privilege'];
            $person = Person::model()->findByPk($id);
            $person->priv_id = $privilege;
            if ($person->save()) {
                $this->redirect(array('Role'));
            } else {
                echo 'Error';
            }
        }
    }

}
