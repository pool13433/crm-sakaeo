<?php $baseUrl = Yii::app()->baseUrl; ?>
<h3 class="ui top attached header">
    สินค้าร่วมรายการ
</h3>
<div class="ui attached segment">
    <div class="ui cards four stackable">
        <?php foreach ($products as $index => $data) { ?>
            <div class="ui card">
                <div class="content">
                    <div class="right floated">แต้ม 5000 แต้ม</div>
                    <div class="floated">ราคา <?= $data['prod_price'] ?> บาท</div>
                </div>
                <div class="image">
                    <img src="<?=$baseUrl?>/images/coming-soon.png">
                </div>
                <div class="content">
                    <a class="header"><?= $data['prod_name'] ?></a>
                    <div class="meta">
                        <span class="date">วันที่จำหน่าย <?= $data['prod_date'] ?></span>
                    </div>
                    <div class="meta">
                        <span class="price">ราคา <?= $data['prod_price'] ?> บาท</span>
                    </div>
                </div>
                <div class="extra">
                    Rating:
                    <div class="ui star rating" data-rating="3" data-max-rating="9"></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>