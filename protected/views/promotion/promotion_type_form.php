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
                <label>ชื่อประเภทโปรโมชั่น</label>
                <input type="hidden" name="data[type_id]" value="<?= $promType->type_id ?>">
                <input type="text" name="data[type_name]" placeholder="ชื่อประเภทโปรโมชั่น" required value="<?= $promType->type_name ?>">
            </div>
        </div>
        <div class="field">
            <div class="field">
                <label>ชื่อประเภทโปรโมชั่น</label>
                <textarea class="form-control"  name="data[type_detail]" rows="8" cols="40" placeholder="รายประเภทละเอียดโปรโมชั่น" required><?= $promType->type_detail ?></textarea>
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
