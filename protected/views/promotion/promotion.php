<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลโปรโมชั่น
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/FormPromotion" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>โค๊ดโปรโมชั่น</th>
                <th>ชื่อโปรโมชั่น</th>
                <th>รายละเอียด</th>
                <th>ประเภท</th>
                <th>วันที่เริ่ม</th>
                <th>วันทีสิ้นสุด</th>
                <th>วันที่สร้าง</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($promotion) > 0) {
                $number = 0;
                $points = 0;
                foreach ($promotion as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['prom_code'] ?></td>
                        <td><?= $row['prom_name'] ?></td>
                        <td><?= $row['prom_detail'] ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td><?= $row['prom_startdate'] ?></td>
                        <td><?= $row['prom_enddate'] ?></td>
                        <td><?= $row['prom_date'] ?></td>
                        <td><?= $row['prom_status'] ?></td>
                        <td><a  class="ui labeled icon button teal"  href="<?= $baseUrl ?>/promotion/FormPromotion/<?= $row['prom_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                        <td><a  class="ui labeled icon button red"  href="<?= $baseUrl ?>/promotion/DeletePromotion/<?= $row['prom_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
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
                    <td colspan="10" class="text-center">ไม่พบข้อมูลประวัติการแลกขอลรางวัล</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

