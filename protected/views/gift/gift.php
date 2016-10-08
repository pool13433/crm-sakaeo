<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการของรางวัล
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/gift/FormGift" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>รหัสของรางวัล</th>
                <th>ชื่อของรางวัล</th>
                <th>ประเภท</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($gift) > 0) {
                $number = 0;
                $points = 0;
                foreach ($gift as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['gift_code'] ?></td>
                        <td><?= $row['gift_name'] ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td><a  class="ui labeled icon button teal"  href="<?= $baseUrl ?>/gift/FormGift/<?= $row['gift_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                        <td><a  class="ui labeled icon button red"  href="<?= $baseUrl ?>/gift/DeleteGift/<?= $row['gift_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
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
