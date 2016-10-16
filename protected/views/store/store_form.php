<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการบริษัท
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/store/store" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/store/SaveStore" method="post">
        <div class="five fields">
            <div  class="field">
                <label for="name">โค๊ดของบริษัท<stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[store_id]" value="<?= $store->store_id ?>">
                <input type="text" class="form-control" name="data[store_code]" placeholder="โค๊ดของบริษัท" required value="<?= $store->store_code ?>">
            </div>
        </div>
        <div class="field">
            <label for="store_name">ชื่อบริษัท <stong style="color:red;">*</stong></label>
            <input type="text" class="form-control" name="data[store_name]" placeholder="ชื่อบริษัท" required value="<?= $store->store_name ?>">
        </div>
        <div class="field">
            <label for="store_name">ที่อยู่</label>
            <textarea name="data[store_address]" ><?= $store->store_address ?></textarea>
        </div>
        <div class="five fields">
            <div class="field">
                <label for="store_name">เบอร์โทรบริษัท <stong style="color:red;">*</stong></label>
                <input type="text" class="form-control" name="data[store_mobile]" placeholder="เบอร์โทรบริษัท" required value="<?= $store->store_mobile ?>">
            </div>
            <div class="field">
                <label for="fruit">สถานะของ เมนู <stong style="color:red;">*</stong></label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input name="data[store_status]" <?= ($store['store_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                        <label>เปิด</label>
                    </div>
                    <div class="ui radio checkbox">
                        <input name="data[store_status]" tabindex="0" <?= ($store['store_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
                        <label>ปิด</label>
                    </div>
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

