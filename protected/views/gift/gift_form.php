<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการของรางวัล
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/gift/gift" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/gift/SaveGift" method="post">
        <div class="three fields">
            <div class="field">
                <label for="name">โค๊ดของรางวัล</label>
                <input type="hidden" name="data[gift_id]" value="<?= $gift->gift_id ?>">
                <input type="text" class="form-control" name="data[gift_code]" placeholder="โค๊ดของรางวัล" required value="<?= $gift->gift_code ?>">
            </div>
            <div class="field">
                <label for="gift_name">ชื่อของรางวัล</label>
                <input type="text" class="form-control" name="data[gift_name]" placeholder="ชื่อของรางวัล" required value="<?= $gift->gift_name ?>">
            </div>
            <div class="field">
                <label>ประเภทของรางวัล</label>
                <select class="form-control" name="data[type_id]" required>
                    <?php foreach ($giftTypes as $index => $data) { ?>
                        <?php if ($data['type_id'] == $gift->type_id) { ?>
                            <option value="<?= $data['type_id'] ?>" selected><?= $data['type_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $data['type_id'] ?>"><?= $data['type_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="name" class="col-sm-2 control-label">จำนวนของรางวัล</label>
                <input type="number" name="data[gift_no]" placeholder="จำนวนของรางวัล" required value="<?= $gift->gift_no ?>">
            </div>
            <div class="field">
                <label for="name" class="col-sm-2 control-label">เกณฑ์คะแนนของรางวัล</label>
                <input type="number" name="data[gift_point]" placeholder="เกณฑ์คะแนนของรางวัล" required value="<?= $gift->gift_point ?>">
            </div>
        </div>
        <button type="submit" class="ui button green" onclick="return confirm('บันทึก ?')">
            <i class="save icon"></i> บันทึก
        </button>
        <button type="reset" class="ui button orange">
            <i class="eraser icon"></i> ล้าง
        </button>
    </form>
</div>

