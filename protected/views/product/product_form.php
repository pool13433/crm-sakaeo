<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการสินค้า
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/product/product" class="ui labeled icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/product/SaveProduct" method="post">
        <div class="three fields">
            <div class="field">
                <label>โค๊ดสินค้า <stong style="color:red;">*</stong></label>
                <input type="hidden" name="data[prod_id]" value="<?= $prod->prod_id ?>">
                <input type="text" class="form-control" name="data[prod_code]" placeholder="โค๊ดสินค้า" required value="<?= $prod->prod_code ?>">
            </div>
            <div class="field">
                <label>ชื่อสินค้า <stong style="color:red;">*</stong></label>
                <input type="text" class="form-control" name="data[prod_name]" placeholder="ชื่อสินค้า" required value="<?= $prod->prod_name ?>">
            </div>
            <div class="field">
                <label>ประเภทโปรโมชั่น <stong style="color:red;">*</stong></label>
                <select class="form-control" name="data[type_id]" required>
                    <?php foreach ($prodTypes as $index => $data) { ?>
                        <?php if ($data['type_id'] == $prod->type_id) { ?>
                            <option value="<?= $data['type_id'] ?>" selected><?= $data['type_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $data['type_id'] ?>"><?= $data['type_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="ui fields three">
            <div class="field">
                <label>สังกัดบริษัท <stong style="color:red;">*</stong></label>
                <select class="form-control" name="data[store_id]" required>
                    <?php foreach ($stores as $index => $data) { ?>
                        <?php if ($data['store_id'] == $prod->store_id) { ?>
                            <option value="<?= $data['store_id'] ?>" selected><?= $data['store_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $data['store_id'] ?>"><?= $data['store_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="field">
                <label for="name">ราคาสินค้า <stong style="color:red;">*</stong></label>
                <input type="number" class="form-control" name="data[prod_price]" placeholder="ราคาสินค้า" required value="<?= $prod->prod_price ?>">
            </div>
            <div class="field">
                <label for="fruit">สถานะ <stong style="color:red;">*</stong></label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input name="data[prod_status]" <?= ($prod['prod_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                        <label>เปิด</label>
                    </div>
                    <div class="ui radio checkbox">
                        <input name="data[prod_status]" tabindex="0" <?= ($prod['prod_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
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

