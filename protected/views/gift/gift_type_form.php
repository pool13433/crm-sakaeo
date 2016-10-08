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
                <label for="name" class="col-sm-2 control-label">ชื่อประเภทของรางวัล</label>
                <input type="hidden" name="data[type_id]" value="<?= $type->type_id ?>">
                <input type="text" class="form-control" name="data[type_name]" placeholder="ชื่อประเภทของรางวัล" required value="<?= $type->type_name ?>">
            </div>
        </div>
        <div class="field">
            <label for="detail" class="col-sm-2 control-label">รายละเอียดประเภทของรางวัล</label>
            <div class="col-sm-10">
                <textarea class="form-control"  name="data[type_detail]" rows="8" cols="40" placeholder="รายละเอียดประเภทของรางวัล" required><?= $type->type_detail ?></textarea>
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
