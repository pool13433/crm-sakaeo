<?php $baseUrl = Yii::app()->baseUrl; ?>
<h5 class="ui top attached header">
    จัดการข้อมูล Point
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/promotion/FormPoint" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ประเภท Point</th>                
                <th>ประเภทสินค้า</th>                
                <th>รายละเอียดการให้ Point</th>
                <th>เงื่อนไข</th>
                <th>ระยะเวลา Point</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = 0;
            $points = 0;
            foreach ($point as $index => $row) {
                ?>
                <tr>
                    <td class="text-center"><?= ($index + 1) ?></td>
                    <td><?= $row['point_type'] ?></td>                        
                    <td><?= $row['product_type'] ?></td>                        
                    <td><?= $row['point_detail'] ?></td>
                    <td><?= $row['point_condition'] ?></td>
                    <td><?= $row['point_startdate'].' ถึง '.$row['point_enddate'] ?></td>
                    <td><?= $row['point_status'] ?></td>
                    <td><a class="ui labeled icon button teal" href="<?= $baseUrl ?>/promotion/FormPoint/<?= $row['point_id'] ?>">
                            <i class="pencil icon"></i> แก้ไข</a>
                    </td>
                    <td><a class="ui labeled icon button red"  href="<?= $baseUrl ?>/promotion/DeletePoint/<?= $row['point_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
                            <i class="remove icon"></i> ลบ</a>
                    </td>
                </tr>
                <?php }
            ?>
        </tbody>
    </table>
</div>
