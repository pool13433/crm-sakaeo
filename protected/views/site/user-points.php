<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php if (!empty($serialCode)) { ?>
    <h2 class="ui top attached header">
        ข้อมูลแต้มการใช้งานสะสม ของคุณ <?= $profile['name'] ?>
    </h2>
    <div class="ui attached segment">
        <div class="ui large breadcrumb">
            <a class="section" href="<?= $baseUrl ?>/site/index/<?= $serialCode ?>">หน้าหลัก</a>
            <i class="right chevron icon divider"></i>
            <li class="active section">ข้อมูลแต้มการใช้งานสะสม</li>
        </div>

        <table class="ui table celled striped">

            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>เลขที่สินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคาสินค้า</th>
                    <th>วันที่ซื้อ/ได้รับแต้ม</th>
                    <th>จำนวนแต้มทีไ่ด้รับ</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $prices = 0;
                 $points = 0;
                if (count($profilePoints) > 0) {                                       
                    foreach ($profilePoints as $index => $row) {
                        ?>
                        <tr>
                            <td><?= ($index + 1) ?></td>
                            <td><?= $row['prod_code'] ?></td>
                            <td><?= $row['prod_name'] ?></td>
                            <td class="center aligned"><?= $row['prod_price'] ?></td>
                            <td class="center aligned"><?= $row['buy_point'] ?></td>
                            <td class="center aligned"><?= $row['date_points'] ?></td>
                            <td><?= $row['tran_status'] ?></td>
                        </tr>
                        <?php
                        $prices += $row['prod_price'];
                        $points += $row['buy_point'];
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="10" class="center aligned">ไม่พบข้อมูลแต้มสะสม</td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="center aligned">รวม</th>
                    <th class="center aligned"><?= $prices ?> บาท</th>
                    <th class="center aligned"><?= $points ?> แต้ม</th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
<?php } else { ?>
    <h1 class="center aligned">ไม่พบข้อมูลผู้ใช้งาน</h1>
<?php } ?>