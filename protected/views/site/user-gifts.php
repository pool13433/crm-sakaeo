<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php if (!empty($serialCode)) { ?>
    <h2 class="ui top attached header">
        ข้อมูลประวัติการแลกขอลรางวัล ของคุณ <?= $profile['name'] ?>
    </h2>
    <div class="ui attached segment">
        <div class="ui large breadcrumb">
            <a class="section" href="<?= $baseUrl ?>/site/index/<?= $serialCode ?>">หน้าหลัก</a>
            <i class="right chevron icon divider"></i>
            <li class="active section">ข้อมูลประวัติการแลกขอลรางวัล</li>
        </div>

        <table class="ui table celled striped">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัสของรางวัล</th>
                    <th>ชื่อของรางวัล</th>
                    <th>แต้มที่ต้องใช้แลก/ชิ้น</th>
                    <th>จำนวน</th>
                    <th>แต้มที่ต้องใช้แลกทั้งหมด</th>
                    <th>วันที่แลก</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 0;
                $points = 0;
                if (count($profileGifts) > 0) {
                    $index = 1;
                    foreach ($profileGifts as $index => $row) {
                        ?>
                        <tr>
                            <td><?= ($index + 1) ?></td>
                            <td><?= $row['gift_code'] ?></td>
                            <td><?= $row['gift_name'] ?></td>
                            <td><?= $row['gift_point'] ?></td>
                            <td class="text-center"><?= $row['swop_number'] ?></td>
                            <td class="text-center"><?= $row['swop_point']?></td>
                            <td class="text-center"><?= $row['swop_date'] ?></td>
                        </tr>
                        <?php
                        $number += $row['swop_number'];
                        $points += $row['swop_point'] ;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="10" class="text-center">ไม่พบข้อมูลประวัติการแลกขอลรางวัล</td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="ui center aligned" colspan="4">รวม</th>
                    <th class="text-center"><?= $number ?></th>
                    <th class="text-center"><?= $points ?></th>
                    <th class="text-center"></th>
                </tr>
            </tfoot>
        </table>
    </div>
<?php } else { ?>
    <h1 class="text-center">ไม่พบข้อมูลผู้ใช้งานห</h1>
<?php } ?>