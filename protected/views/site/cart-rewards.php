<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="ui grid stackable" ng-controller="CartController as vm" ng-cloak>
    <div class="eleven wide column">
        <h1 class="ui top attached header">
        <!--    <a href="<?= $baseUrl ?>/site/CartConfirm" class="ui right floated button green">
                ถัดไป <i class="arrow right icon"></i> 
            </a>-->
            รายการของรางวัลที่คุณเลือก
        </h1>
        <div class="ui attached segment">
            <?php $pointUsage = 0; ?>
            <?php if (count($carts) > 0) { ?>
                <div class="ui cards three stackable">
                    
                    <?php foreach ($carts as $index => $data) { ?>
                        <div class="ui card">
                            <div class="content">
                                <div class="right floated">แต้ม 5000 แต้ม</div>
                                <div class="floated">คะแนน <?= $data['gift_point'] ?> คะแนน</div>
                            </div>
                            <div class="image">
                                <img src="/images/avatar2/large/kristy.png">
                            </div>
                            <div class="content">
                                <a class="header"><?= $data['gift_name'] ?></a>
                                <div class="meta">
                                    <span class="date">วันที่จำหน่าย <?= $data['gift_date'] ?></span>
                                </div>
                            </div>
                            <div class="extra">
                                Rating:
                                <div class="ui star rating" data-rating="3" data-max-rating="9"></div>
                            </div>
                            <div class="extra content">
                                <div class="ui two buttons">
                                    <a class="ui  green button red" href="<?= $baseUrl ?>/site/RemoveRewardItem/<?= $index ?>" onclick="return confirm('ยืนยันการลบของรางวัลออกจากตะกร้า')">ลบ</a>
                                    <div class="ui  button blue">เพิ่มเติม...</div>
                                </div>
                            </div>
                        </div>
                    <?php } $pointUsage += $data['gift_point'] ?>
                </div>
            <?php } else { ?>
                <div class="ui warning message">
                    <div class="header">
                        ไม่พบของรางวัลที่คุณเลือก
                    </div>
                    คุณยังไม่ได้เลือกของรางวัลเลย
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    $member = Yii::app()->session['member'];
    $point = $member['point'];
    $profile = $member['profile'];
    ?>

    <div class="five wide column">
        <h1 class="ui top attached header">
            ข้อมูลที่เกี่ยวข้อง
        </h1>
        <div class="ui attached segment">
            <h2>ข้อมูลเกี่ยวกับ Point</h2>
            <ol class="ui middle aligned divided list big">
                <li value="*"> Point ของคุณ
                    <ol><li value=""><?= $point ?></li></ol>
                </li>
                <li value="*"> Point สำหรับการใช้แลก Point ในรอบนี้
                    <ol><li value=""><?= $pointUsage ?></li></ol>
                </li>
                <li value="*"> Point คงเหลือ
                    <ol><li value=""><?= ($point - $pointUsage) ?></li></ol>
                </li>
            </ol>
            <p class="ui divider"></p>
            <h2>ข้อมูลรูปแบบการจัดส่ง</h2>
            <form class="ui form" ng-model="vm.formCart" ng-submit="vm.confirmCart()">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input name="receive" type="radio" value="store" ng-model="vm.receive">
                        <label>รับที่หน้าร้าน</label>
                    </div>
                </div>
                <div class="ui two fields">
                    <div class="field"  style="padding-left:30px;">
                        <label>รับที่หน้าร้าน เลือกสาขา</label>
                        <select ng-model="vm.store" class="ui dropdown">
                            <option ng-repeat="store in vm.storeList" value="{{ store.store_id}}">{{ store.store_name}}</option>
                        </select>
                    </div>
                </div>
                <div class="ui divider"></div>
                
                <div class="field">
                    <div class="ui radio checkbox">
                        <input name="receive" type="radio" value="postoffice" ng-model="vm.receive">
                        <label>จัดส่งที่ไปรษณีย์</label>
                    </div>
                </div>
                <div class="field">
                    <label>ชื่อ </label>
                    <input placeholder="กรอกชื่อ" type="text" name="fname"
                           ng-init="vm.fname = '<?= $profile['per_fname'] ?>'" ng-model="vm.fname">
                </div>
                <div class="field">
                    <label>สกุล</label>
                    <input placeholder="กรอกนามสกุล" type="text" 
                           ng-init="vm.lname = '<?= $profile['per_lname'] ?>'"  ng-model="vm.lname">
                </div>
                <div class="field">
                    <label>เบอร์โทรติดต่อ</label>
                    <input placeholder="กรอกเบอร์โทร" type="text" 
                           ng-init="vm.mobile = '<?= $profile['per_mobile'] ?>'" ng-model="vm.mobile">
                </div>
                <div class="field">
                    <label>ที่อยู่</label>
                    <textarea ng-model="vm.address" ng-init="vm.address = '<?= $profile['per_address'] ?>'"></textarea>
                </div>
                
                <button class="ui button green">แลกของรางวัล</button>                    
                <button class="ui button orange">ยกเลิก</button>        
            </form>
        </div>
    </div>
</div>
