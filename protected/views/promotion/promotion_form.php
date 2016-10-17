<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลโปรโมชั่น
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/Promotion" class="ui h3ed icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/promotion/SavePromotion" method="post">
        <div class="three fields">
            <div class="field">
                <h3>โค๊ดโปรโมชั่น <stong style="color:red;">*</stong></h3>
                <input type="hidden" name="data[prom_id]" value="<?= $prom->prom_id ?>">
                <input type="text" name="data[prom_code]" placeholder="โค๊ดโปรโมชั่น" required value="<?= $prom->prom_code ?>">
            </div>
             <div class="field">
                <h3>ชื่อโปรโมชั่น <stong style="color:red;">*</stong></h3>
                <input type="text" name="data[prom_name]" placeholder="ชื่อโปรโมชั่น" required value="<?= $prom->prom_name ?>">
            </div>
            <div class="field">
                <h3>ประเภทโปรโมชั่น <stong style="color:red;">*</stong></h3>
                <select name="data[type_id]" required class="ui dropdown">
                    <?php foreach ($promTypes as $index => $data) { ?>
                        <?php if ($data['type_id'] == $prom->type_id) { ?>
                            <option value="<?= $data['type_id'] ?>" selected><?= $data['type_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $data['type_id'] ?>"><?= $data['type_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="field">
            <h3>รายละเอียดโปรโมชั่น</h3>
            <textarea name="data[prom_detail]" rows="8" cols="40" placeholder="รายละเอียดโปรโมชั่น"><?= $prom->prom_detail ?></textarea>
        </div>
        <div class="three fields">
            <div class="field">
                <h3>วันที่เริ่มโปรโมชั่น <stong style="color:red;">*</stong></h3>
                <input type="text" class="datepicker" name="data[prom_startdate]" readonly placeholder="วันที่เริ่มโปรโมชั่น" required value="<?= $prom->prom_startdate ?>">
            </div>
            <div class="field">
                <h3>วันที่สิ้นสุดโปรโมชั่น <stong style="color:red;">*</stong></h3>
                <input type="text" class="datepicker" name="data[prom_enddate]" readonly placeholder="วันที่สิ้นสุดโปรโมชั่น" required value="<?= $prom->prom_enddate ?>">
            </div>
        </div>
        <div class="field">
            <h3>สถานะของโปรโมชั่น<stong style="color:red;">*</stong></h3>
            <div class="field">
                <div class="ui radio checkbox">
                    <input name="data[prom_status]" <?= ($prom['prom_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                    <label>เปิด</label>
                </div>
                <div class="ui radio checkbox">
                    <input name="data[prom_status]" tabindex="0" <?= ($prom['prom_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
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
