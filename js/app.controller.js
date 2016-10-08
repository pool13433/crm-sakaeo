app.controller('LoginController', LoginController)
        .controller('CartController', CartController);

function CartController($window, $log, CRMService) {
    var vm = this;
    //vm.rdoStore = true;
    CRMService.getStores()
            .then(function success(response) {
                vm.storeList = response;
            }, function fail(e) {
                $log.error(e);
            })
            .catch(function (e) {
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
        var isConfirm = $window.confirm('ยืนยันการแลกของรางวัล');
        if (isConfirm){
            CRMService.confirmCart(intormation)
                    .then(function success(response) {
                        $window.alert(response.message);
                    }, function fail(e) {
                        $log.error(e);
                        $window.alert(e);
                    })
                    .catch(function (e) {
                        $log.error(e);
                    });
        }
    }
}

function LoginController($window, $log, $timeout, CRMService) {
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
        if (username === undefined || password === undefined) {
            vm.messageVisible = true;
            vm.title = 'ท่านยังไม่ได้กรอกข้อมูล Username หรือ Password';
            vm.message = 'กรุณากรอกข้อมูลก่อนการ Login';
        } else {
            this.loading = true;
            CRMService.login(username, password)
                    .then(function success(response) {
                        vm.messageVisible = true;
                        vm.title = response.title;
                        vm.message = response.message;
                        if (response.status) {
                            vm.messageClass = true;
                            $timeout(function () {
                                vm.loading = false;
                                $window.location.href = response.redirect;
                            }, 1000);
                        }
                    }, function fail(e) {
                        $log.error(e);
                    }).catch(function (e) {
                $log.error(e);
            });
        }

    }
}



