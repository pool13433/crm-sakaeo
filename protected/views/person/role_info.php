<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="">
    <h3 class="ui top attached header">
        <u>จัดการข้อมูลผู้ใช้งาน</u>
    </h3>
    <div class="ui attached segment">
        <a href="<?= $baseUrl ?>/person/role" class="ui icon button grey tiny">
            <i class="arrow left icon"></i> ย้อนกลับ
        </a>
        <div class="ui divider"></div>
        <form class="ui form" action="<?= $baseUrl . '/person/SaveRole' ?>" method="post">
            <div class="three fields header medium ui">
                <div class="field inline">
                    <label>ชื่อผู้ใช้งาน</label>
                    <label><?= $person['per_username'] ?></label>
                </div>
            </div>
            <div class="three fields header medium ui">
                <div class="field inline">
                    <label>ชื่อ</label>
                    <label><?= $person['per_fname'] ?></label>
                </div>
                <div class="field inline">
                    <label>สกุล</label>
                    <label><?= $person['per_lname'] ?></label>
                </div>
            </div>
            <div class="three fields header medium ui">
                <div class="field inline">
                    <label>อีเมล์</label>
                    <label><?= $person['per_email'] ?></label>
                </div>
                <div class="field inline">
                    <label>สถานะ</label>
                    <label><?= $person['per_status'] ?></label>
                </div>
            </div>
            <div class="field inline">                
                <span class="header medium ui">สิทธิการเข้าใช้งานเมนู <stong style="color:red;">*</stong></span>
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
            <button type="submit" class="ui button green">
                <i class="save icon"></i> บันทึก
            </button>
        </form>
    </div>
</div>