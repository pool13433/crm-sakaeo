<?php $baseUrl = Yii::app()->baseUrl; ?>

<?php if (!empty($serialCode)) { ?>
    <h2 class="ui top attached header">
        ข้อมูลการใช้บริการ ของคุณ <?= $profile['name'] ?>
    </h2>
    <div class="ui attached segment">
        <div class="ui large breadcrumb">
            <a class="section" href="<?= $baseUrl ?>/site/index/<?= $serialCode ?>">หน้าหลัก</a>
            <i class="right chevron icon divider"></i>
            <li class="active section">ข้อมูลการใช้บริการ</li>
        </div>

        <table class="ui table celled striped">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัสชื่อร้าน</th>
                    <th>ชื่อร้าน</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคาสินค้า</th>
                    <th>วันที่รับบริการ</th>
                    <th>จำนวนแต้มทีไ่ด้รับ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prices = 0;
                $points = 0;
                if (count($tranBuys) > 0) {
                    foreach ($tranBuys as $index => $row) {
                        ?>
                        <tr>
                            <td><?= ($index + 1) ?></td>
                            <td><?= $row['store_code'] ?></td>
                            <td><?= $row['store_name'] ?></td>
                            <td><?= $row['prod_name'] ?></td>
                            <td class="text-center"><?= $row['prod_price'] ?></td>
                            <td class="text-center"><?= $row['buy_date'] ?></td>
                            <td class="text-center"><?= $row['buy_point'] ?></td>
                        </tr>
                        <?php
                        $prices += $row['prod_price'];
                        $points += $row['buy_point'];
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="10" class="text-center">ไม่พบข้อมูลแต้มสะสม</td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-center">รวม</th>
                    <th class="text-center"><?= $prices ?></th>
                    <th></th>
                    <th class="text-center"><?= $points ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
<?php } else { ?>
    <h1 class="text-center">ไม่พบข้อมูลผู้ใช้งาน</h1>
<?php } ?>
</div>