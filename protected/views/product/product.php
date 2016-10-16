<?php $baseUrl = Yii::app()->baseUrl; ?>

<h5 class="ui top attached header">
    จัดการสินค้า
</h5>
<div class="ui attached segment">
    <a href="<?= $baseUrl ?>/product/FormProduct" class="ui labeled icon button blue">
        <i class="plus icon"></i> เพิ่มใหม่
    </a>
    <table class="ui table celled striped">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>รหัสของสินค้า</th>
                <th>ชื่อของสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>ประเภทสินค้า</th>
                <th>สถานะสินค้า</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($product) > 0) {
                $number = 0;
                $points = 0;
                foreach ($product as $index => $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?= ($index + 1) ?></td>
                        <td><?= $row['prod_code'] ?></td>
                        <td><?= $row['prod_name'] ?></td>
                        <td><?= $row['prod_price'] ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td><?= $row['prod_status'] ?></td>
                        <td><a  class="ui labeled icon button teal"  href="<?= $baseUrl ?>/product/FormProduct/<?= $row['prod_id'] ?>">
                                <i class="pencil icon"></i> แก้ไข
                            </a>
                        </td>
                        <td><a  class="ui labeled icon button red"  href="<?= $baseUrl ?>/product/DeleteProduct/<?= $row['prod_id'] ?>" onclick="return confirm('ยืนยันการลบ')">
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
</div>
</div>