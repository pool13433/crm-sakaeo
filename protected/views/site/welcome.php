<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php
$member = Yii::app()->session['member'];
$profile = $member['profile'];
$point = $member['point'];
?>
<h1 class="ui top attached header clearing">
    <div class="ui right floated button green">แต้มสะสมของคุณคือ <?= $point ?> แต้ม</div>
    ยินดีต้อนรับ คุณ <?= $profile['per_fname'] . '     ' . $profile['per_lname'] ?> 
</h1>
<div class="ui attached segment">
    <h3>เครื่อสุรพลใจดี แลก Ponts แลกของรางวัลสุดเก๋</h3>
    <h4>เมื่อซื้อสินค้า และ บริการ ภายในเครือ xxxxxx,xxxxxxx,xxxxxxx </h4>
    <div class="ui stackable two column grid">
        <div class="column">
            <h2 class="ui top attached header clearing">
<!--                    <a href="<?= $baseUrl ?>/site/rewardScope" class="ui right floated button green">ดูของรางวัลที่แลกได้ทั้งหมด</a>-->
                ของรางวัลที่คุณแลกได้ 
            </h2>
            <div class="ui attached segment">
                <?php if (count($giftByPoint) > 0) { ?>
                    <div class="ui cards two stackable">
                        <?php foreach ($giftByPoint as $index => $data) { ?>
                            <div class="ui card">
                                <div class="content">
                                    <div class="header"><?= $data['gift_point'] ?> คะแนน</div>
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
                <?php } else { ?>
                    <div class="ui warning message">
                        <div class="header">
                            ไม่พบของรางวัลที่คุณสามารถแลกได้
                        </div>
                        แต้มสะสมของคุณไม่พอ ขอแสดงความเสียใจด้วยครับ
                    </div>
                <?php } ?>                
            </div>
        </div>
        <div class="column">
            <h2 class="ui top attached header clearingr">
                <a href="<?= $baseUrl ?>/site/reward" class="ui right floated button green">ดูของรางวัลสุด Hot ทั้งหมด</a>
                ของรางวัลสุด Hot 
            </h2>
            <div class="ui attached segment">
                <div class="ui cards two">
                    <?php foreach ($giftAll as $index => $data) { ?>
                        <div class="ui card">
                            <div class="content">
                                <div class="header"><?= $data['gift_point'] ?> คะแนน</div>
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
                                    <?php if ($point > $data['gift_point']) { ?>
                                        <a href="<?= $baseUrl ?>/site/addRewardItem/<?= $data['gift_id'] ?>" class="ui  green button">แลก</a>
                                    <?php } ?>
                                    <div class="ui  button blue">เพิ่มเติม...</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>