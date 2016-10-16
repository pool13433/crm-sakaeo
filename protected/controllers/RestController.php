<?php

//http://www.yiiframework.com/extension/ehttpclient/
Yii::import('ext.EHttpClient.*');
Yii::import('application.vendor.Guzzle.*');

//require_once('/path/to/framework/yii.php');
Yii::registerAutoloader(array('Guzzle','autoload'));

class RestController extends Controller {

    public function actionExample() {

        // get my twitter status
        $client = new EHttpClient('http://localhost:8080/MemberCard/member/index', array(
            'maxredirects' => 0,
            'timeout' => 30));
        $response = $client->request();
        var_dump($response->getRawBody());
    }

    public function actionHttpful() {
       
        
    }

}
