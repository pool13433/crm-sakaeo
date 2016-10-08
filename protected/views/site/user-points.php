<?php $baseUrl = Yii::app()->baseUrl; ?>
<div class="col-lg-12 col-md-12 col-sm-12">
    <ol class="breadcrumb">
        <li><a href="<?= $baseUrl ?>/site/index/<?= $serialCode ?>">หน้าหลัก</a></li>
        <li class="active">ข้อมูลแต้มการใช้งานสะสม</li>
    </ol>
    <?php if (!empty($serialCode)) { ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>ข้อมูลแต้มการใช้งานสะสม ของคุณ <?= $profile['name'] ?></h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped">
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
                        if (count($profilePoints) > 0) {
                            $prices = 0;
                            $points = 0;
                            foreach ($profilePoints as $index => $row) {
                                ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $row['pro_code'] ?></td>
                                    <td><?= $row['pro_name'] ?></td>
                                    <td class="text-center"><?= $row['pro_price'] ?></td>
                                    <td class="text-center"><?= $row['cal_points'] ?></td>
                                    <td class="text-center"><?= $row['date_points'] ?></td>
                                    <td><?= $row['tran_status'] ?></td>
                                </tr>
                                <?php
                                $prices += $row['pro_price'];
                                $points += $row['cal_points'];
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
                            <th colspan="3" class="text-center">รวม</th>
                            <th class="text-center"><?= $prices ?> บาท</th>
                            <th class="text-center"><?= $points ?> แต้ม</th>
                            <th class="2"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <h1 class="text-center">ไม่พบข้อมูลผู้ใช้งาน</h1>
    <?php } ?>
</div>