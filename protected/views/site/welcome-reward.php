<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php
$member = Yii::app()->session['member'];
$profile = $member['profile'];
$point = $member['point'];
?>
<h3 class="ui top attached header">
    รายการของรางวัล
</h3>
<div class="ui attached segment">
    <form class="ui form" action="<?= $baseUrl ?>/site/reward" method="post">
        <h2>ค้นหา</h2>  
        <div class="three fields">
            <div class="field">
                <label>ชื่อ</label>
                <input placeholder="กรอกข้อมูล" type="text" name="name" value="<?= $criteria['name'] ?>">
            </div>
            <div class="field">
                <label>ประเภทของรางวัล</label>
                <select class="ui dropdown" placeholder="" name="type">
                    <option value="" selected>--เลือก--</option>
                    <?php foreach ($type as $index => $data) { ?>
                        <?php if ($data['type_id'] == $criteria['type']) { ?>
                            <option value="<?= $data['type_id'] ?>" selected><?= $data['type_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $data['type_id'] ?>"><?= $data['type_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>        
        <button type="submit" class="ui submit button green">ค้นหา</button>
    </form>
</div>
<div class="ui attached segment">
    <div class="ui cards four">
        <?php foreach ($gifts as $index => $data) { ?>
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
                         <?php if ($point >= $data['gift_point']) { ?>
                            <a href="<?= $baseUrl ?>/site/addRewardItem/<?= $data['gift_id'] ?>" class="ui  green button">แลก</a>
                        <?php } ?>
                        <div class="ui  button blue">เพิ่มเติม...</div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>