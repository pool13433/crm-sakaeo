<?php $baseUrl = Yii::app()->baseUrl; ?>

<h5 class="ui top attached header">
    จัดการข้อมูลประเภทโปรโมชั่น
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/PromotionType" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/promotion/SavePromotionType" method="post">
        <div class="three fields">
            <div class="field">
                <label>โค๊ดประเภทโปรโมชั่น <stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[type_id]" value="<?= $promType->type_id ?>">
                <input type="text" name="data[type_code]" placeholder="โค๊ดประเภทโปรโมชั่น" required value="<?= $promType->type_code ?>">
            </div>
            <div class="field">
                <label>ชื่อประเภทโปรโมชั่น <stong style="color:red;">*</stong></label>
                <input type="text" name="data[type_name]" placeholder="ชื่อประเภทโปรโมชั่น" required value="<?= $promType->type_name ?>">
            </div>
        </div>
        <div class="field">
            <div class="field">
                <label>ชื่อประเภทโปรโมชั่น <stong style="color:red;">*</stong></label>
                <textarea class="form-control"  name="data[type_detail]" rows="8" cols="40" placeholder="รายประเภทละเอียดโปรโมชั่น" required><?= $promType->type_detail ?></textarea>
            </div>
        </div>
        <div class="field">
            <label>สถานะของประเภทโปรโมชั่น<stong style="color:red;">*</stong></label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input name="data[type_status]" <?= ($promType['type_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                    <label>เปิด</label>
                </div>
                <div class="ui radio checkbox">
                    <input name="data[type_status]" tabindex="0" <?= ($promType['type_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
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
