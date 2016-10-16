<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="">
    <h2 class="ui top attached header">
        จัดการข้อมูลผู้ใช้งาน
    </h2>
    <div class="ui attached segment">
        <a href="<?= $baseUrl ?>/person/role" class="ui labeled icon button blue">
            <i class="arrow left icon"></i> ย้อนกลับ
        </a>
        <div class="ui divider"></div>
        <form class="ui form" action="<?= $baseUrl . '/person/SaveRole' ?>" method="post">
            <div class="three fields">
                <div class="field">
                    <h3>ชื่อผู้ใช้งาน</h3>
                    <label>xxxx</label>
                </div>
                <div class="field">
                    <h3>สกุล</h3>
                    <label>yyyy</label>
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <h3>Email</h3>
                    <label>xxxxx@gmail.com</label>
                </div>
                <div class="field">
                    <h3>สถานะ</h3>
                    <label> Administrator</label>
                </div>
            </div>
            <div class="fields">
                <div class="six wide field">
                    <h3>สิทธิการเข้าใช้งานเมนู <stong style="color:red;">*</stong></h3>
                    <input type="hidden" name="id" value="<?= $person['per_id'] ?>"/>
                    <select class="ui dropdown" name="privilege">
                        <option value="">-- เลือกสิทธิ --</option>
                        <?php foreach ($profile as $key => $profile) { ?>
                            <?php if ($profile['priv_id'] == $person['priv_id']) { ?>
                                <option value="<?= $profile['priv_id'] ?>" selected><?= $profile['priv_desc'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $profile['priv_id'] ?>"><?= $profile['priv_desc'] ?></option>
                            <?php } ?>
                        <?php } ?>                       
                    </select>
                </div>
            </div>
            <button type="submit" class="ui button green" onclick="return confirm('บันทึก ?')">
                <i class="save icon"></i> บันทึก
            </button>
        </form>
    </div>
</div>