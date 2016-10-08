<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลโปรโมชั่น
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/Promotion" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/promotion/SavePromotion" method="post">
        <div class="three fields">
            <div class="field">
                <label>ชื่อโปรโมชั่น</label>
                <input type="hidden" name="data[prom_id]" value="<?= $prom->prom_id ?>">
                <input type="text" name="data[prom_name]" placeholder="ชื่อโปรโมชั่น" required value="<?= $prom->prom_name ?>">
            </div>
            <div class="field">
                <label>รายละเอียดโปรโมชั่น</label>
                <select name="data[type_id]" required>
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
            <label>รายละเอียดโปรโมชั่น</label>
            <textarea name="data[prom_detail]" rows="8" cols="40" placeholder="รายละเอียดโปรโมชั่น" required><?= $prom->prom_detail ?></textarea>
        </div>
        <div class="three fields">
            <div class="field">
                <label>วันที่เริ่มโปรโมชั่น</label>
                <input type="text" class="datepicker" name="data[prom_startdate]" readonly placeholder="วันที่เริ่มโปรโมชั่น" required value="<?= $prom->prom_startdate ?>">
            </div>
            <div class="field">
                <label>วันที่สิ้นสุดโปรโมชั่น</label>
                <input type="text" class="datepicker" name="data[prom_enddate]" readonly placeholder="วันที่สิ้นสุดโปรโมชั่น" required value="<?= $prom->prom_enddate ?>">
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
