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
                <label for="name">โค๊ดของรางวัล <stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[gift_id]" value="<?= $gift->gift_id ?>">
                <input type="text" class="form-control" name="data[gift_code]" placeholder="โค๊ดของรางวัล" required value="<?= $gift->gift_code ?>">
            </div>
            <div class="field">
                <label for="gift_name">ชื่อของรางวัล <stong style="color:red;">*</stong></label>
                <input type="text" class="form-control" name="data[gift_name]" placeholder="ชื่อของรางวัล" required value="<?= $gift->gift_name ?>">
            </div>
            <div class="field">
                <label>ประเภทของรางวัล <stong style="color:red;">*</stong></label>
                <select name="data[type_id]" required class="ui dropdown">
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
                <label>จำนวนของรางวัล <stong style="color:red;">*</stong></label>
                <input type="number" name="data[gift_no]" placeholder="จำนวนของรางวัล" required value="<?= $gift->gift_no ?>">
            </div>
            <div class="field">
                <label>เกณฑ์คะแนนของรางวัล <stong style="color:red;">*</stong></label>
                <input type="number" name="data[gift_point]" placeholder="เกณฑ์คะแนนของรางวัล" required value="<?= $gift->gift_point ?>">
            </div>
        </div>
        <div class="field">
            <label for="fruit">สถานะของ เมนู <stong style="color:red;">*</stong></label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input name="data[gift_status]" <?= ($gift['gift_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                    <label>เปิด</label>
                </div>
                <div class="ui radio checkbox">
                    <input name="data[gift_status]" tabindex="0" <?= ($gift['gift_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
                    <label>ปิด</label>
                </div>
            </div>
        </div>
        <button type="submit" class="ui button green">
            <i class="save icon"></i> บันทึก
        </button>
        <button type="reset" class="ui button orange">
            <i class="eraser icon"></i> ล้าง
        </button>
    </form>
</div>

