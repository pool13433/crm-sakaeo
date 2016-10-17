app.controller('MemberController', MemberController)
        .controller('CartController', CartController)
        .controller('BarcodeController', BarcodeController)
        .controller('SalesController', SalesController)
        .controller('PointController', PointController);
function PointController($log, $window) {
    var vm = this;

    this.selectedOption = function () {
        console.log(vm.ddOption);
        if (vm.ddOption !== undefined) {
            $('.options').hide();
            $('.options').css({visibility: 'hidden'});
            $('#option' + vm.ddOption).show();
            $('#option' + vm.ddOption).css({visibility: 'visible'});
        }
    }

    $('form[name="frmPoint"]').submit(function () {
        var pointTypeId = vm.ddOption;
        console.log('ddOption ::==' + pointTypeId);
        var pointCase = $('#point_case' + pointTypeId).val();
        var pointResult = $('#point_result' + pointTypeId).val();
        var pointStartDate = $('#point_startdate' + pointTypeId).val();
        var pointEndDate = $('#point_enddate' + pointTypeId).val();
        console.log('pointCase ::==' + pointCase);
        console.log('pointResult ::==' + pointResult);
        console.log('pointStartDate ::==' + pointStartDate);
        console.log('pointEndDate ::==' + pointEndDate);
        if (pointCase === '' || pointResult === '' || pointStartDate === '' || pointEndDate === '') {
            $window.alert('กรุณากรอกข้อมูลเงื่อนไขการให้ Point ให้ครบถ้วน');
            return false;
        }
        return false;
    });
}

function SalesController(CRMService, QuaggsJSService, $log, $window, $timeout) {
    var vm = this;
    this.productChooseList = [];
    this.genarateKey = {};
    this.openCamera = function () {
        $('#modalCamera').modal('show');
        QuaggsJSService.initInstance('#camera')
                .then(function success(response) {
                    Quagga.onDetected(function (data) {
                        //console.log(' ===>> Detecting ');
                        console.log(data.codeResult.code);
                        if (data.codeResult.code.length > 1) {
                            Quagga.stop();
                            $timeout(function () {
                                var serial = data.codeResult.code;
                                //vm.result = data.codeResult.code;
                                vm.isLoading = false;
                                CRMService.getCustomer(serial)
                                        .then(function success(customer) {
                                            console.log(customer);
                                            if (customer !== null) {
                                                $timeout(function () {
                                                    mappingCustomer(customer);
                                                }, 500);
                                            } else {
                                                $window.alert('ไม่พบข้อมูลลูกค้าในระบบ');
                                            }
                                            $('#modalCamera').modal('hide');
                                        }, function fail(e) {
                                            $log.error(e);
                                        });
                            }, 500);
                        }
                    });
                }, function fail(e) {
                    $log.error(e);
                });
    }

    function mappingCustomer(customer) {
        vm.customerId = customer.per_id;
        vm.customerSerial = customer.per_serial;
        vm.customerFname = customer.per_fname;
        vm.customerLname = customer.per_lname;
    }

    this.findProduct = function () {
        var input = this.product;
        CRMService.getProducts(input)
                .then(function success(response) {
                    vm.productList = response;
                    $('#modalProduct').modal('show');
                }, function fail(e) {
                    $log.error(e);
                });
    }

    this.findCustomer = function () {
        var input = this.customer;
        CRMService.getCustomers(input)
                .then(function success(response) {
                    vm.customerList = response;
                    $('#modalCustomer').modal('show');
                }, function fail(e) {
                    $log.error(e);
                });
    }
    this.chooseProduct = function (product) {
        var listSize = vm.productChooseList.length;
        vm.productChooseList.push(product);
        vm.genarateKey[listSize] = '0';
        $('#modalProduct').modal('hide');
    }
    this.chooseCustomer = function (customer) {
        vm.customerId = customer.per_id;
        vm.customerSerial = customer.per_serial;
        vm.customerFname = customer.per_fname;
        vm.customerLname = customer.per_lname;
        $('#modalCustomer').modal('hide');
    }
    this.removeProduct = function (index) {
        console.log(index);
        vm.productChooseList.splice(index, 1);
    }
    this.resetSales = function () {
        vm.productChooseList = [];
    }
    this.submitSales = function () {
        var customer = {
            customerId: vm.customerId,
            customerSerial: vm.customerSerial,
            customerFname: vm.customerFname,
            customerLname: vm.customerLname,
            storeId: vm.store
        };
        if (vm.store === undefined) {
            $window.alert('กรุณาเลือก store ที่จำหน่าย');
        } else if (vm.customerId === undefined) {
            $window.alert('กรุณาใส่ข้อมูลลูกค้า');
        } else if (vm.productChooseList.length === 0) {
            $window.alert('กรุณาเลือก สินค้าเพื่อจำหน่ายอย่างน้อย 1 ชิ้น');
        } else {
            var productsFinal = mapProductNumber();
            //vm.productChooseList = productsFinal;
            //console.log(productsFinal);
            var isConfirm = $window.confirm('ยืนยันการบันทึกข้อมูลการขายนี้ ใช่ หรือ ไม่');
            if (isConfirm) {
                CRMService.saveSales(customer, productsFinal)
                        .then(function success(response) {
                            $window.alert(response.message);
                            if (response.status) {
                                $window.location.href = response.redirect;
                            }
                        }, function fail(e) {
                            $log.error(e);
                        });
            }
        }
    }

    function mapProductNumber() {
        var products = [];
        angular.forEach(vm.productChooseList, function (product, _index) {
            var _number = vm.genarateKey[_index];
            //console.log(product.prod_number);
            //console.log(_number);
            product['prod_number'] = _number;
            products.push(product);
        });
        return products;
    }
}

function BarcodeController(QuaggsJSService, CRMService, $log, $timeout) {
    var vm = this;
    if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia !== null) {//=== 'function') {
// safely access `navigator.mediaDevices.getUserMedia`
        vm.result = 'yyyyyyy';
        this.openCamera = function () {
            $('#camera').empty();
            vm.isLoading = true;
            QuaggsJSService.initInstance('#camera')
                    .then(function success(response) {

                        Quagga.onDetected(function (data) {
                            //console.log(' ===>> Detecting ');
                            console.log(data.codeResult.code);
                            if (data.codeResult.code.length > 1) {
                                Quagga.stop();
                                $timeout(function () {
                                    var serial = data.codeResult.code;
                                    //vm.result = data.codeResult.code;
                                    vm.isLoading = false;
                                    getProfileContent(serial);
                                    //alert(' barcode ::=='+data.codeResult.code);                                
                                }, 1000);
                            }
                        });
                    }, function fail() {

                    });
        }


    } else {

    }

    function getProfileContent(serial) {
        CRMService.getProfile(serial)
                .then(function success(html) {
                    $('#camera').html(html);
                }, function fail(e) {
                    console.log(e);
                });
    }

}

function CartController($window, $log, CRMService) {
    var vm = this;
    //vm.rdoStore = true;
    CRMService.getStores()
            .then(function success(response) {
                vm.storeList = response;
            }, function fail(e) {
                $log.error(e);
            });
    this.confirmCart = function () {
        console.log(vm.receive);
        var intormation = {
            fname: vm.fname,
            lname: vm.lname,
            address: vm.address,
            mobile: vm.mobile,
            receive: vm.receive,
            store: vm.store
        };
        console.log('receive ::==' + vm.receive);
        console.log('point ::==' + vm.point);
        console.log('store ::==' + vm.store)
        if (vm.point === undefined || vm.point === 0) {
            $window.alert('กรุณาเลือกของรางวัลก่อนการยืนยัน');
        } else if (vm.receive === undefined) {
            $window.alert('กรุณาเลือก รูปแบบการจัดส่ง');
        } else if (vm.receive !== undefined && vm.store === undefined) {
            $window.alert('กรุณาเลือก สาขามารับของรางวัล');
        } else {
            var isConfirm = $window.confirm('ยืนยันการแลกของรางวัล');
            if (isConfirm) {
                CRMService.confirmCart(intormation)
                        .then(function success(response) {
                            $window.alert(response.message);
                            $window.location.href = response.redirect;
                        }, function fail(e) {
                            $log.error(e);
                            $window.alert(e);
                        });
            }
        }
    }
}

function MemberController($window, $log, $timeout, CRMService) {
    var vm = this;
    this.messageVisible = false;
    this.messageClass = false;
    this.message = 'xxxxx';
    this.title = 'yyyyyyy';
    this.loading = false;
    this.signIn = function () {
        vm.messageVisible = false;
        var username = vm.username;
        var password = vm.password;
        var type = (vm.type === undefined ? '' : vm.type);
        if (username === undefined || password === undefined) {
            vm.messageVisible = true;
            vm.title = 'ท่านยังไม่ได้กรอกข้อมูล Username หรือ Password';
            vm.message = 'กรุณากรอกข้อมูลก่อนการ Login';
        } else {
            this.loading = true;
            CRMService.login(username, password, type)
                    .then(function success(response) {
                        vm.messageVisible = true;
                        vm.title = response.title;
                        vm.message = response.message;
                        if (response.status) {
                            vm.messageClass = true;
                            $timeout(function () {
                                //$window.alert(response.message);
                                if (response.status) {
                                    $window.location.href = response.redirect;
                                }
                            }, 500);
                        }
                        vm.loading = false;
                    }, function fail(e) {
                        $log.error(e);
                    });
        }

    }
}



