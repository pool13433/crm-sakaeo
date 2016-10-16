<table class="ui selectable celled table">
    <thead>
        <tr>
            <th>รหัส</th>            
            <th>ชื่อ</th>
            <th>ราคา</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $index => $data) { ?>
            <tr>
                <td ng-click="vm.choose()"><?=$data['prod_code']?></td>
                <td><?=$data['prod_name']?></td>
                <td><?=$data['prod_price']?></td>                
            </tr>
        <?php } ?>
    </tbody>
</table>