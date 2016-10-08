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
                <label>โค๊ดสินค้า</label>
                <input type="hidden" name="data[prod_id]" value="<?= $prod->prod_id ?>">
                <input type="text" class="form-control" name="data[prod_code]" placeholder="โค๊ดสินค้า" required value="<?= $prod->prod_code ?>">
            </div>
            <div class="field">
                <label>ชื่อสินค้า</label>
                <input type="text" class="form-control" name="data[prod_name]" placeholder="ชื่อสินค้า" required value="<?= $prod->prod_name ?>">
            </div>
            <div class="field">
                <label>ประเภทโปรโมชั่น</label>
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
                <label>store </label>
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
                <label for="name" class="col-sm-2 control-label">ราคาสินค้า</label>
                <input type="number" class="form-control" name="data[prod_price]" placeholder="ราคาสินค้า" required value="<?= $prod->prod_price ?>">
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

