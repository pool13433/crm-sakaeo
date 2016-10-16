<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการบริษัท
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/store/FormStore" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>รหัสบริษัท</th>
                <th>ชื่อบริษัท</th>
                <th>ที่อยู่</th>
                <th>โทร</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($stores) > 0) {
                $number = 0;
                $points = 0;
                foreach ($stores as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['store_code'] ?></td>
                        <td><?= $row['store_name'] ?></td>
                        <td><?= $row['store_address'] ?></td>
                        <td><?= $row['store_mobile'] ?></td>
                        <td><?= $row['store_status'] ?></td>
                        <td><a  class="ui labeled icon button teal"  href="<?= $baseUrl ?>/store/FormStore/<?= $row['store_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                        <td><a  class="ui labeled icon button red"  href="<?= $baseUrl ?>/store/DeleteStore/<?= $row['store_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
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
                    <td colspan="10" class="ui text-center">ไม่พบข้อมูลขอลรางวัล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
