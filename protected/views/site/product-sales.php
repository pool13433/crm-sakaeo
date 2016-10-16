<div class="" ng-controller="SalesController as vm">
    <h2 class="ui top attached header">
        หน้าจอรายการทำการขาย
    </h2>
    <div class="ui attached segment">
        <div class="ui">
            <button class="ui button green" ng-click="vm.submitSales()"><i class="checkmark icon"></i>จบการขาย</button>
            <button class="ui button blue" ng-click="vm.resetSales()"><i class="repeat icon"></i>เริ่มการขายใหม่</button>
        </div>
        <div class="ui form">
            <div class="three fields">
                <div class="field">
                    <label>เลือก สาขา</label>
                    <select class="ui dropdown" ng-model="vm.store">
                        <option value="">-- เลือก --</option> 
                        <?php foreach ($stores as $index => $store) { ?>
                            <option value="<?= $store['store_id'] ?>"><?= $store['store_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>รหัสลูกค้า</label>
                    <div class="ui action input">
                        <input type="hidden" ng-model="vm.customerId">
                        <input placeholder="Search..." type="text" ng-model="vm.customerSerial">
                        <button class="ui icon button green" ng-click="vm.findCustomer()">
                            <i class="search icon"></i> 
                        </button>
                        <button class="ui icon button blue" ng-click="vm.openCamera()">
                            <i class="barcode icon"></i>
                        </button>
                    </div>
                </div>
                <div class="field">
                    <label>ชื่อ</label>
                    <input placeholder="ชื่อลูกค้า" type="text" readonly ng-model="vm.customerFname">
                </div>
                <div class="field">
                    <label>สกุล</label>
                    <input placeholder="สกุลลูกค้า" type="text" readonly ng-model="vm.customerLname">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>รหัสสินค้า</label>
                    <div class="ui action input">
                        <input placeholder="Search..." type="text" ng-model="vm.product">
                        <button class="ui icon button green" ng-click="vm.findProduct()">
                            <i class="search icon"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="ui selectable celled table">
            <thead>
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th style="width: 20%;">จำนวน</th>
                    <th style="width: 7%;">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="product in vm.productChooseList">
                    <td ng-click="vm.choose()">{{ product.prod_code}}</td>
                    <td>{{ product.prod_name}}</td>
                    <td>{{ product.prod_price}}</td>       
                    <td class="ui form"><input type="text" ng-model="vm.genarateKey[$index]"/></td>
                    <td><button type="button" class="ui button red" ng-click="vm.removeProduct($index)"><i class="remove icon"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="ui modal small" ng-model="vm.modalCamera" id="modalCamera">
        <div class="header">Barcode Scanner</div>
        <div class="image content" id="camera">
        </div>
    </div>


    <div class="ui modal" ng-model="vm.modalProduct" id="modalProduct">
        <i class="close icon negative"></i>
        <div class="header">
            ค้นหาสินค้า
        </div>
        <div class="image content">
            <table class="ui selectable celled table">
                <thead>
                    <tr>
                        <th>รหัส</th>            
                        <th>ชื่อ</th>
                        <th>ราคา</th>            
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in vm.productList">
                        <td>
                            <a href="#" ng-click="vm.chooseProduct(product)">{{ product.prod_code}}</a>
                        </td>
                        <td>{{ product.prod_name}}</td>
                        <td>{{ product.prod_price}}</td>                
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="actions">
            <div class="ui button orange negative">ปิด</div>
        </div>
    </div>

    <div class="ui modal" ng-model="vm.modalCustomer" id="modalCustomer">
        <i class="close icon negative"></i>
        <div class="header">
            ค้นหาลูกค้า
        </div>
        <div class="image content">
            <table class="ui selectable celled table">
                <thead>
                    <tr>
                        <th>รหัส</th>            
                        <th>ชื่อ</th>
                        <th>มือถือ</th>            
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="customer in vm.customerList">
                        <td>
                            <a href="#" ng-click="vm.chooseCustomer(customer)">{{ customer.per_serial}}</a>
                        </td>
                        <td>{{ customer.per_fname}}  {{customer.per_lname}}</td>
                        <td>{{ customer.per_mobile}}</td>                
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="actions">
            <div class="ui button orange negative">ปิด</div>
        </div>
    </div>
</div>