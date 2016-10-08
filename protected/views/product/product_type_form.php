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
                <label for="name" class="col-sm-2 control-label">ชื่อประเภทของสินค้า</label>
                <input type="hidden" name="data[type_id]" value="<?= $type->type_id ?>">
                <input type="text" class="form-control" name="data[type_name]" placeholder="ชื่อประเภทของสินค้า" required value="<?= $type->type_name ?>">
            </div>
        </div>
        <div class="ui three fields">
            <div class="field">
                <label for="name" class="col-sm-2 control-label">เกณฑ์ราคาต่ำ</label>
                <input type="number" class="form-control" name="data[type_min_price]" placeholder="เกณฑ์ราคาต่ำ" required value="<?= $type->type_min_price ?>">
            </div>
            <div class="field">
                <label for="name" class="col-sm-2 control-label">เกณฑ์คะแนน</label>
                <input type="number" class="form-control" name="data[type_points]" placeholder="เกณฑ์คะแนน" required value="<?= $type->type_points ?>">
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
