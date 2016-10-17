<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="ui left vertical inverted red sidebar labeled icon menu sidebar-toggle-close large simple " data-visible="close">
    <a class="item" id="hide-sidebar" href="javascript:void(0)">
        <i class="remove icon"></i>
    </a>
    <?php if (!empty(Yii::app()->session['member'])) { ?>
        <?php $profile = Yii::app()->session['member']['profile'] ?>
        <?php if ($profile['per_status'] == 1) { ?>
            <a class="ui item" href="<?= $baseUrl . '/site/findCustomer' ?>">ค้นหาลูกค้า</a>
            <a class="ui item" href="<?= $baseUrl . '/site/ProductSales' ?>">ขายสินค้า</a>
        <?php } ?>
    <?php } ?>    
    <?php $profile = Yii::app()->session['member']['profile'] ?>
    <?php if ($profile['per_status'] != 1) { ?>       
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
    <?php } ?>    
    <?php if (!empty(Yii::app()->session['member'])) { ?>
        <?php $profile = Yii::app()->session['member']['profile'] ?>
        <?php $menu = Yii::app()->session['member']['menu'];
        ?>
        <?php if ($profile['per_status'] == 1) { ?>
            <?php foreach ($menu as $index => $mn) { ?>
                <div class="ui dropdown item">
                    <?= $mn['menu_name'] ?>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <?php foreach ($mn['subMenu'] as $index => $sub) { ?>
                            <a class="item" href="<?= $baseUrl ?><?= $sub['sub_href'] ?>">
                                <i class="icon <?=$sub['sub_icon']?>"></i> <?= $sub['sub_name'] ?>
                            </a>                    
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php if (!empty(Yii::app()->session['member'])) { ?>
        <?php $profile = Yii::app()->session['member']['profile'] ?>
        <div class="item">
            <div class="header">ข้อมูลลูกค้า</div>
            <div class="menu">
                <a class="item" href="<?= $baseUrl ?>/site/index/<?= $profile['per_serial'] ?>"><i class="user icon"></i> ข้อมูลการใช้บริการ</a>
                <a class="item" href="<?= $baseUrl ?>/site/CartReward"><i class="cart icon"></i> ตะกร้าสินค้าของคุณ</a>
    <!--            <a class="item"><i class="sign out icon"></i>ออกจากระบบ</a>-->
            </div>
        </div>
    <?php } ?>
</div>




