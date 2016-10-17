<?php $baseUrl = Yii::app()->baseUrl; ?>

<h3 class="ui top attached header">
    <u>จัดการสิทธิการเข้าใช้งาน</u>
</h3>
<div class="ui attached segment">
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ชื่อ-สกุล</th>
                <th>Email</th>
                <th>สถานะ</th>
                <th>สิทธิการเข้าใช้งาน</th>
                <th>แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($persons) > 0) {
                foreach ($persons as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $row['per_username'] ?></td>
                        <td><?= $row['per_fname'] . '    ' . $row['per_lname']; ?></td>
                        <td><?= $row['per_mobile'] ?></td>
                        <td><?= $row['per_status'] ?></td>
                        <td><?= $row['privilege'] ?></td>
                        <td><a  class="ui icon button yellow tiny"  href="<?= $baseUrl ?>/person/RoleInfo/<?= $row['per_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="10" class="text-center">ไม่พบข้อมูล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>