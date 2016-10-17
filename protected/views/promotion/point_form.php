<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลประเภท Point
</h5>
<div class="ui attached segment" ng-controller="PointController as vm">
    <a href="<?= $baseUrl ?>/promotion/Point" class="ui h3ed icon button blue">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/promotion/SavePoint" method="post" name="frmPoint">
        <div class="three fields">
            <div class="field">
                <h3>โค๊ด Point [ระบบสร้างให้แบบอัตโนมัติ] </h3>
                <input type="hidden" name="data[point_id]" value="<?= $point['point_id'] ?>">
                <input type="text" name="data[point_code]" placeholder="********" disabled value="<?= $point['point_code'] ?>">
            </div>
            <div class="field">
                <h3>สินค้าร่วมรายการ <stong style="color:red;">*</stong></h3>
                <select name="data[product_typeid]" required>
                    <option value="" selected>-- เลือก ประเภท สินค้าร่วมรายการ --</option>
                    <?php foreach ($productTypes as $index => $type) { ?>                       
                        <?php if ($type['type_id'] == $point['product_typeid']) { ?>
                            <option value="<?= $type['type_id'] ?>" selected><?= $type['type_name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $type['type_id'] ?>"><?= $type['type_name'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="field">
            <h3>รายละเอียด Point <stong style="color:red;">*</stong></h3>
            <textarea name="data[point_detail]" rows="3" cols="40" placeholder="รายละเอียดประเภท Point" required><?= $point['point_detail'] ?></textarea>
        </div>
        <div class="four fields">
            <div class="field">
                <h3>ประเภท Point <stong style="color:red;">*</stong></h3>
                <select name="data[point_typeid]" ng-change="vm.selectedOption()" ng-model="vm.ddOption" 
                        ng-init="vm.ddOption = '<?= $point['point_typeid'] ?>'" required>
                    <option value="" selected>-- เลือก ประเภท Point --</option>
                    <?php foreach ($pointTypes as $index => $type) { ?>                       
                        <?php if ($type['type_id'] == $point['point_typeid']) { ?>
                            <option value="<?= $type['type_id'] ?>" selected><?= $type['type_detail'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $type['type_id'] ?>"><?= $type['type_detail'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="field">
            <h3>เงื่อนไข การให้ Point <stong style="color:red;">*</stong></h3>
            <?php
            foreach ($pointTypes as $option) {
                $optionDisplay = 'none';
                ?>
                <?php
                if ($option['type_id'] == $point['point_typeid']) {
                    $optionDisplay = 'inline';
                }
                ?>
                <div class="inline field options" id="option<?= $option['type_id'] ?>" 
                     style="display: <?= $optionDisplay ?>;">
                    <label><?= $option['label_begin'] ?></label>
                    <input placeholder="กรอกจำนวน <?= $option['label_begin'] ?>" type="number"
                           name="data[point_case<?= $option['type_id'] ?>]" 
                           id="point_case<?= $option['type_id'] ?>" value="<?= $point['point_case'] ?>">
                    <label><?= $option['label_middle'] ?></label>
                    <input placeholder="กรอกจำนวน <?= $option['label_middle'] ?>" type="number" 
                           name="data[point_result<?= $option['type_id'] ?>]" 
                           id="point_result<?= $option['type_id'] ?>" 
                           value="<?= $point['point_result'] ?>">
                    <label><?= $option['label_end'] ?></label>
                    <br/><br/>
                    <label>วันที่เริ่มโปรโมชั่น</label>
                    <input type="text" class="datepicker" name="data[point_startdate<?= $option['type_id'] ?>]" readonly 
                           placeholder="วันที่เริ่มโปรโมชั่น"  
                           id="point_startdate<?= $option['type_id'] ?>" 
                           value="<?= $point['point_startdate'] ?>">
                    <label>วันที่สิ้นสุดโปรโมชั่น</label>
                    <input type="text" class="datepicker" name="data[point_enddate<?= $option['type_id'] ?>]" readonly 
                           id="point_enddate<?= $option['type_id'] ?>" 
                           placeholder="วันที่สิ้นสุดโปรโมชั่น"   value="<?= $point['point_enddate'] ?>">
                </div>
            <?php } ?>
        </div>
        <div class="field">
            <h3>สถานะของประเภท Point<stong style="color:red;">*</stong></h3>
            <div class="field">
                <div class="ui radio checkbox">
                    <input name="data[point_status]" <?= ($point['point_status'] == 'active' ? 'checked' : '') ?> tabindex="0"  type="radio" required value="active">
                    <label>เปิด</label>
                </div>
                <div class="ui radio checkbox">
                    <input name="data[point_status]" tabindex="0" <?= ($point['point_status'] == 'inactive' ? 'checked' : '') ?>  type="radio" required value="inactive">
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
