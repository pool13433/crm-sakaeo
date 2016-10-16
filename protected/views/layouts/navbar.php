<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="ui fixed big inverted red main menu ">
    <div class="ui container">
        <a href="javascript:void(0)" class="launch icon item sidebar-toggle">
            <i class="content icon"></i>
        </a>
        <a class="item" href="<?=$baseUrl.'/site/welcome'?>">
            CRM 
        </a>
        <div class="right menu">
<!--            <div class="ui dropdown item">
                จัดการเกี่ยวกับโปรโมชั่น <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?= $baseUrl ?>/promotion/PromotionType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทโปรโมชั่น</a>
                    <a class="item" href="<?= $baseUrl ?>/promotion/Promotion"><i class="glyphicon glyphicon-bullhorn"></i> จัดการโปรโมชั่น</a>
                </div>
            </div>
            <div class="ui dropdown item">
                จัดการของรางวัล <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?= $baseUrl ?>/gift/giftType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของรางวัล</a>
                    <a class="item" href="<?= $baseUrl ?>/gift/gift"><i class="glyphicon glyphicon-gift"></i> จัดการของรางวัล</a>
                </div>
            </div>
            <div class="ui dropdown item">
                จัดการสินค้า <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item"  href="<?= $baseUrl ?>/product/productType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของสินค้า</a>
                    <a class="item"  href="<?= $baseUrl ?>/product/product"><i class="glyphicon glyphicon-shopping-cart"></i> จัดการสินค้า</a>
                </div>
            </div>-->
            <?php if (empty(Yii::app()->session['member'])) { ?>
                <a href="<?= $baseUrl . '/site/login' ?>" class="item">
                    <i class="sign in icon"></i>
                    เข้าระบบ
                </a>         
<!--                <a href="#" class="item">
                    <i class="add user icon"></i> ลงทะเบียน
                </a>-->
            <?php } else { ?>
                <a href="<?= $baseUrl . '/site/logout' ?>" class="item">
                    <i class="sign out icon"></i> ออกจากระบบ
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<!--<div class="ui small menu fixed">
    <a class="active item sidebar-click" href="javascript:void(0)">
        CRM
    </a>
    <div class="right menu">
        <div class="ui dropdown item">
            จัดการเกี่ยวกับโปรโมชั่น <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?= $baseUrl ?>/promotion/PromotionType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทโปรโมชั่น</a>
                <a class="item" href="<?= $baseUrl ?>/promotion/Promotion"><i class="glyphicon glyphicon-bullhorn"></i> จัดการโปรโมชั่น</a>
            </div>
        </div>
        <div class="ui dropdown item">
            จัดการของรางวัล <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?= $baseUrl ?>/gift/giftType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของรางวัล</a>
                <a class="item" href="<?= $baseUrl ?>/gift/gift"><i class="glyphicon glyphicon-gift"></i> จัดการของรางวัล</a>
            </div>
        </div>
        <div class="ui dropdown item">
            จัดการสินค้า <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item"  href="<?= $baseUrl ?>/product/productType"><i class="glyphicon glyphicon-th-large"></i> จัดการประเภทของสินค้า</a>
                <a class="item"  href="<?= $baseUrl ?>/product/product"><i class="glyphicon glyphicon-shopping-cart"></i> จัดการสินค้า</a>
            </div>
        </div>
        <div class="item">
            <div class="ui primary button">Sign Up</div>
        </div>
    </div>
</div> -->


