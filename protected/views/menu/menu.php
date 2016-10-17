<?php $baseUrl = Yii::app()->baseUrl; ?>
<h3 class="ui top attached header">
    <u>กำหนดสิทธิการเข้าใช้งาน</u>
</h3>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/menu/FormMenu" class="ui icon button green tiny">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อของรางวัล</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($menus) > 0) {
                $number = 0;
                $points = 0;
                foreach ($menus as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['priv_name'] ?></td>
                        <td><?= $row['priv_desc'] ?></td>
                        <td><?= $row['priv_status'] ?></td>
                        <td><a  class="ui icon button yellow tiny"  href="<?= $baseUrl ?>/menu/FormMenu/<?= $row['priv_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                        <td><a  class="ui icon button red tiny"  href="<?= $baseUrl ?>/menu/DeleteMenu/<?= $row['priv_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
                                <i class="remove icon"></i> ลบ
                            </a>
                        </td>
                    </tr>
                    <?php
                    $index++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="10" class="ui text-center">ไม่พบข้อมูลประวัติการแลกขอลรางวัล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
