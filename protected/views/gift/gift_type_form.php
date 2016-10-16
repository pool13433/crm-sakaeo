<?php $baseUrl = Yii::app()->baseUrl; ?>

<h5 class="ui top attached header">
    จัดการประเภทของรางวัล
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/gift/GiftType" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/gift/saveGiftType" method="post">
        <div class="three fields">
            <div class="field">
                <label>โค๊ดประเภทของรางวัล <stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[type_id]" value="<?= $type->type_id ?>">
                <input type="text" name="data[type_code]" placeholder="โค๊ดประเภทของรางวัล" required value="<?= $type->type_code ?>">
            </div>           
            <div class="field">
                <label>ชื่อประเภทของรางวัล <stong style="color:red;">*</stong></label>
                <input type="text" name="data[type_name]" placeholder="ชื่อประเภทของรางวัล" required value="<?= $type->type_name ?>">
            </div>
        </div>
        <div class="field">
            <label>รายละเอียดประเภทของรางวัล </label>
            <div class="col-sm-10">
                <textarea class="form-control"  name="data[type_detail]" rows="8" cols="40" placeholder="รายละเอียดประเภทของรางวัล"><?= $type->type_detail ?></textarea>
            </div>
        </div>
        <div class="field">
            <label>สถานะของประเภทของรางวัล<stong style="color:red;">*</stong></label>
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
