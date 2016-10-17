<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลประเภท Point
</h5>
<div class="ui attached segment">
<!--    <a href="<?= $baseUrl ?>/promotion/FormPointType" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>-->
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>โค๊ดประเภท Point</th>
                <th>ชื่อประเภท Point</th>
                <th>รายละเอียดประเภท</th>
                <th>วันที่สร้าง</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
<!--                <th>ลบ</th>-->
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 0;
            $points = 0;
            if (count($pointType)) {
                foreach ($pointType as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['type_code'] ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td><?= $row['type_detail'] ?></td>
                        <td><?= $row['type_date'] ?></td>
                        <td><?= $row['type_status'] ?></td>
                        <td><a class="ui labeled icon button teal" href="<?= $baseUrl ?>/promotion/FormPointType/<?= $row['type_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข</a>
                        </td>
<!--                        <td><a class="ui labeled icon button red"  href="<?= $baseUrl ?>/promotion/DeletePointType/<?= $row['type_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
                                <i class="remove icon"></i> ลบ</a>
                        </td>-->
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
