<?php $baseUrl = Yii::app()->baseUrl; ?>
<h3 class="ui top attached header">
   <u>กำหนดสิทธิการเข้าใช้งาน</u>
</h3>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/menu/menu" class="ui icon button grey tiny">
        <i class="arrow left icon"></i> ย้อนกลับ
    </a>
    <div class="ui divider"></div>
    <form class="ui form"  action="<?= $baseUrl ?>/menu/SaveMenu" method="post">
        <div class="fields">
            <div  class="ten wide field">
                <div class="field">
                    <h3 for="priv_name">ชื่อสิทธิการเข้าใช้งาน <stong style="color:red;">*</stong></h3>
                    <input type="hidden" name="data[priv_id]" value="<?= $menuPrivilege->priv_id ?>">
                    <input type="text" class="form-control" name="data[priv_name]" placeholder="ชื่อสิทธิการเข้าใช้งาน" required value="<?= $menuPrivilege->priv_name ?>">
                </div>
                <div class="field">
                    <h3 for="priv_name">รายละเอียดสิทธิการเข้าใช้งาน </h3>
                    <textarea  name="data[priv_desc]"  placeholder="รายละเอียดสิทธิการเข้าใช้งาน"><?= $menuPrivilege->priv_desc ?></textarea>
                </div>
                <div class="field">
                    <h3 for="fruit">สถานะของสิทธิการเข้าใช้งาน <stong style="color:red;">*</stong></h3>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input name="data[priv_status]" <?=($menuPrivilege['priv_status'] == 'active'  || empty($menuPrivilege['priv_status']) ? 'checked' : '')?> 
                                   tabindex="0"  type="radio" required value="active">
                            <label>เปิด</label>
                        </div>
                        <div class="ui radio checkbox">
                            <input name="data[priv_status]" tabindex="0" <?=($menuPrivilege['priv_status'] == 'inactive' ? 'checked' : '')?>  type="radio" required value="inactive">
                            <label>ปิด</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="six wide field">                

                <h3 for="priv_name">เมนูเข้าใช้งาน <stong style="color:red;">*</stong></h3>
                <?php foreach ($menus as $index => $menu) { ?>
                    <div class="field">
                        <h4 for="priv_name"><?= $menu['menu_name'] ?></h4>
                        <?php foreach ($menu['subMenu'] as $index => $sub) { ?>
                            <div class="grouped fields">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="ui checkbox">
                                    <input name="menu[]" <?= ($sub['checked'] ? 'checked' : '') ?>
                                           tabindex="0" type="checkbox" value="<?= $sub['sub_id'] ?>">
                                    <label><?= $sub['sub_name'] ?></label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>         
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

