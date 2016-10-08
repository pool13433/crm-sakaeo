<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php if (!empty($serialCode)) { ?>
    <?php if ($person) { ?>
        <h1 class="ui top attached header">
            ข้อมูลส่วนตัวลูกค้า
        </h1>
        <div class="ui attached segment">
            <div class="ui grid stackable">
                <div class="six wide column">
                    <img src="<?= $baseUrl ?>/images/icons/512x512-icon-user.png" alt="" class="img-thumbnail"/>
                </div>
                <div class="ten wide column">
                    <h3>
                        <strong>ชื่อ-สกุล</strong>
                        <?= $person['per_fname'] . '   ' . $person['per_lname'] ?></h3>
                    <h3>
                        <strong>รหัสสมาชิก</strong>
                        <?= $person['per_code'] ?></h3>
                    <h3>
                        <strong>รหัสบัตรประชาชน</strong>
                        <?= $person['per_idcard'] ?></h3>
                    <h3>
                        <strong>อีเมล์</strong>
                        <?= $person['per_email'] ?></h3>
                    <h3>
                        <strong>มือถือ</strong>
                        <?= $person['per_mobile'] ?></h3>
                    <h3>
                        <strong>ที่อยู่</strong>
                        <?= $person['per_address'] ?></h3>
                </div>
            </div>
        </div>

        <h2 class="ui top attached header">
            ช้อมูลการซื้อขาย
        </h2>
        <div class="ui attached segment">
            <div class="ui cards stackable four">
                <div class="ui card">
                    <a class="image" href="<?= $baseUrl ?>/site/points/<?= $serialCode ?>">
                        <img src="<?= $baseUrl ?>/images/icons/256x256-icon-star.png"/>
                    </a>
                    <div class="content">
                        <h2>แต้มสะสม <?= $person['cal_points'] ?> แต้ม</h2>
                    </div>
                    <div class="extra content">
                        <a class="ui button fluid green" href="<?= $baseUrl ?>/site/points/<?= $serialCode ?>">
                            รายละเอียด
                        </a>
                    </div>
                </div>

                <div class="ui card">
                    <a class="image" href="<?= $baseUrl ?>/site/transactions/<?= $serialCode ?>">
                        <img src="<?= $baseUrl ?>/images/icons/256x256-icon-money.png"/>
                    </a>
                    <div class="content">
                        <h2>การใช้บริการ <?= $person['cal_tran'] ?> ครั้ง</h2>
                    </div>
                    <div class="extra content">
                        <a class="ui button fluid blue" href="<?= $baseUrl ?>/site/transactions/<?= $serialCode ?>">
                            รายละเอียด
                        </a>
                    </div>
                </div>

                <div class="ui card">
                    <a class="image" href="<?= $baseUrl ?>/site/gifts/<?= $serialCode ?>">
                        <img src="<?= $baseUrl ?>/images/icons/256x256-icon-gift.png"/>
                    </a>
                    <div class="content">
                        <h2>รางวัลที่แลกไป <?= $person['cal_gift'] ?> ชิ้น</h2>
                    </div>
                    <div class="extra content">
                        <a class="ui button fluid orange" href="<?= $baseUrl ?>/site/gifts/<?= $serialCode ?>">
                            รายละเอียด
                        </a>
                    </div>
                </div>

            </div>
        </div>
    <?php } else { ?>
        <h1 class="text-center">ไม่พบข้อมูลผู้ใช้งาน</h1>
        <a class="btn btn-primary btn-block btn-lg">ลงทะเบียน</a>
    <?php } ?>
<?php } else { ?>
    <h1 class="text-center">ไม่พบข้อมูลผู้ใช้งาน</h1>
<?php } ?>