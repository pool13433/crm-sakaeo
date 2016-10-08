<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    protected function beforeAction($action) {
        $baseUrl = Yii::app()->baseUrl; 
        if (parent::beforeAction($action)) {
            $cs = Yii::app()->clientScript;       
            //C:\xampp5.5\htdocs\CRM\node_modules\semantic-ui-css\semantic.min.css
            $cs->registerCssFile($baseUrl.'/node_modules/semantic-ui-css/semantic.css');
            $cs->registerCssFile($baseUrl.'/node_modules/jquery-ui-dist/jquery-ui.css');
            $cs->registerScriptFile($baseUrl.'/node_modules/jquery/dist/jquery.js',CClientScript::POS_END);       
            $cs->registerScriptFile($baseUrl.'/node_modules/semantic-ui-css/semantic.min.js',CClientScript::POS_END);                   
            $cs->registerScriptFile($baseUrl.'/node_modules/jquery-ui-dist/jquery-ui.js',CClientScript::POS_END);   
            
            $cs->registerScriptFile($baseUrl.'/node_modules/angular/angular.min.js',CClientScript::POS_END);   
            $cs->registerScriptFile($baseUrl.'/js/app.js',CClientScript::POS_END);   
            $cs->registerScriptFile($baseUrl.'/js/app.service.js',CClientScript::POS_END);   
            $cs->registerScriptFile($baseUrl.'/js/app.factory.js',CClientScript::POS_END);   
            $cs->registerScriptFile($baseUrl.'/js/app.controller.js',CClientScript::POS_END);             
            return true;
        }
        return false;
    }

}
