<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="ui left fixed vertical menu" style="padding-top: 50px;">
    <div class="ui">
<!--        <img class="ui mini image" src="/images/logo.png">-->        
    </div>
    <div class="item">
        <div class="header">เมนูการใช้งงาน</div>
        <div class="menu">
            <a class="item" href="<?= $baseUrl ?>/site/welcome"><i class="home icon"></i> หน้าหลัก</a>
            <a class="item" href="<?= $baseUrl ?>/site/product"><i class="motorcycle icon"></i> สินค้าที่ร่วมรายการ</a>   
            <a class="item" href="<?= $baseUrl ?>/site/reward"><i class="gift icon"></i> รายการของรางวัล</a>
            <a class="item"><i class="check circle icon"></i> เงื่อนไขการแลกของรางวัล</a>
            <a class="item"><i class="help circle outline icon"></i> วิธีการแลกของรางวัล</a>
        </div>
    </div>
    <div class="ui dropdown item">
        จัดการเกี่ยวกับโปรโมชั่น
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item" href="<?= $baseUrl ?>/promotion/PromotionType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทโปรโมชั่น</a>
            <a class="item" href="<?= $baseUrl ?>/promotion/Promotion"><i class="glyphicon glyphicon-bullhorn"></i> จัดการโปรโมชั่น</a>            
        </div>
    </div>
    <div class="ui dropdown item">
        จัดการของรางวัล
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item" href="<?= $baseUrl ?>/gift/giftType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของรางวัล</a>
                <a class="item" href="<?= $baseUrl ?>/gift/gift"><i class="glyphicon glyphicon-gift"></i> จัดการของรางวัล</a>
        </div>
    </div>
    <div class="ui dropdown item">
        จัดการสินค้า
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item"  href="<?= $baseUrl ?>/product/productType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของสินค้า</a>
                <a class="item"  href="<?= $baseUrl ?>/product/product"><i class="glyphicon glyphicon-shopping-cart"></i> จัดการสินค้า</a>
        </div>
    </div>
    <div class="item">
        <div class="header">ข้อมูลลูกค้า</div>
        <div class="menu">
            <a class="item" href="<?= $baseUrl ?>/site/CartReward"><i class="cart icon"></i> ตะกร้าสินค้าของคุณ</a>
            <a class="item"><i class="sign out icon"></i>ออกจากระบบ</a>
        </div>
    </div>


</div>
