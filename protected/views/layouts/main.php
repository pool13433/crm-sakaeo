<?php $baseUrl = Yii::app()->baseUrl; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style type="text/css">
            @font-face {
                font-family: 'Athiti';
                font-style: normal;
                font-weight: 400;
                src: local('Athiti'), local('Athiti-Regular'), url(<?=$baseUrl.'/fonts/athiti.woff2'?>) format('woff2');
                unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
            }
        </style>
    </head>
    <body ng-app="crmApp" style="font-family: 'Athiti', sans-serif;">
        <?php $this->renderPartial('/layouts/navbar') ?>
        <div class="computer tablet only row">
            <?php //$this->renderPartial('/layouts/navbar-computer') ?>
        </div>
        <div class="mobile only row">
            <?php $this->renderPartial('/layouts/navbar-mobile') ?>
        </div>
        <div class="pusher" style="margin-top: 45px;">
            <div class="ui container">                
                <?php echo $content; ?>
            </div>
        </div> 
    </body>
</html>
