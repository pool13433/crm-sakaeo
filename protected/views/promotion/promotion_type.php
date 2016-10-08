<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูลประเภทโปรโมชั่น
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/FormPromotionType" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อประเภทโปรโมชั่น</th>
                <th>รายละเอียดประเภท</th>
                <th>วันที่สร้าง</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 0;
            $points = 0;
            if (count($promotionType)) {
                foreach ($promotionType as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td><?= $row['type_detail'] ?></td>
                        <td><?= $row['type_date'] ?></td>
                        <td><a class="ui labeled icon button teal" href="<?= $baseUrl ?>/promotion/FormPromotionType/<?= $row['type_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข</a>
                        </td>
                        <td><a class="ui labeled icon button red"  href="<?= $baseUrl ?>/promotion/DeletePromotionType/<?= $row['type_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
                                <i class="remove icon"></i> ลบ</a>
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
