<?php $baseUrl = Yii::app()->baseUrl; ?>

<h5 class="ui top attached header">
    จัดการประเภทของสินค้า
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/product/productType" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/product/SaveProductType" method="post">        
        <div class="three fields">
            <div class="field">
                <label for="name">โค๊ดประเภทของสินค้า <stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[type_id]" value="<?= $type->type_id ?>">
                <input type="text" class="form-control" name="data[type_code]" placeholder="โค๊ดประเภทของสินค้า" required value="<?= $type->type_code ?>">
            </div>
            <div class="field">
                <label for="name">ชื่อประเภทของสินค้า <stong style="color:red;">*</stong></label>
                <input type="text" class="form-control" name="data[type_name]" placeholder="ชื่อประเภทของสินค้า" required value="<?= $type->type_name ?>">
            </div>
        </div>
        <div class="ui three fields">
            <div class="field">
                <label for="name">เกณฑ์ราคาต่ำ <stong style="color:red;">*</stong></label>
                <input type="number" class="form-control" name="data[type_min_price]" placeholder="เกณฑ์ราคาต่ำ" required value="<?= $type->type_min_price ?>">
            </div>
            <div class="field">
                <label for="name">เกณฑ์คะแนน <stong style="color:red;">*</stong></label>
                <input type="number" class="form-control" name="data[type_points]" placeholder="เกณฑ์คะแนน" required value="<?= $type->type_points ?>">
            </div>
        </div>
        <div class="field">
            <label for="fruit">สถานะ <stong style="color:red;">*</stong></label>
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
