<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลประเภท Point
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/PointType" class="ui h3ed icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/promotion/SavePointType" method="post">
        <div class="three fields">
            <div class="field">
                <h3>โค๊ดประเภท Point <stong style="color:red;">*</stong></h3>
                <input type="hidden" name="data[type_id]" value="<?= $type->type_id ?>">
                <input type="text" name="data[type_code]" placeholder="โค๊ดประเภท Point" required value="<?= $type->type_code ?>">
            </div>
             <div class="field">
                <h3>ชื่อประเภท Point <stong style="color:red;">*</stong></h3>
                <input type="text" name="data[type_name]" placeholder="ชื่อประเภท Point" required value="<?= $type->type_name ?>">
            </div>
        </div>
        <div class="field">
            <h3>รายละเอียดประเภท Point</h3>
            <textarea name="data[type_detail]" rows="8" cols="40" placeholder="รายละเอียดประเภท Point"><?= $type->type_detail ?></textarea>
        </div>
        <div class="field">
            <h3>สถานะของประเภท Point<stong style="color:red;">*</stong></h3>
            <div class="field">
                <div class="ui radio checkbox">
                    <input name="data[type_status]" <?= ($type['type_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                    <label>เปิด</label>
                </div>
                <div class="ui radio checkbox">
                    <input name="data[type_status]" tabindex="0" <?= ($type['type_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
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
