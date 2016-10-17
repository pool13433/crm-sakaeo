app.service('FacebookService', FacebookService)
        .service('CRMService', CRMService)
        .service('QuaggsJSService', QuaggsJSService);


function QuaggsJSService($q) {
    return {
        quagga: {},
        verifyCamera: function () {
            var defer = $q.defer();
            if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {
                // safely access `navigator.mediaDevices.getUserMedia`
                defer.resolve(true);
            } else {
                defer.reject(false);
            }
            return defer.promise;
        },
        initInstance: function (elementId) {
            var defer = $q.defer();
            Quagga.init({
                numOfWorkers: 4,
                locate: true,
                frequency: 10,
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector(elementId)    // Or '#yourElement' (optional)
                },
                decoder: {
                    readers: ["code_128_reader"],
                }

            }, function (err) {
                if (err) {
                    console.log(err);
                    defer.reject(err);
                }
                console.log("Initialization finished. Ready to start");
                Quagga.start();
                defer.resolve(true);
            });
            return defer.promise;
        },
        cameraDetected: function () {
            var defer = $q.defer();
            Quagga.onDetected(function (data) {
                //console.log(' ===>> Detecting ');
                console.log(data.codeResult.code);
                if (data.codeResult.code !== '?') {
                    defer.resolve(data);
                }
            });
            return defer.promise;
        },
        cameraStop: function () {
            Quagga.stop();
        },
        _scanner: null,
        init: function () {
            this.attachListeners();
        },
        decode: function (src) {
            Quagga
                    .decoder({readers: ['ean_reader']})
                    .locator({patchSize: 'medium'})
                    .fromImage(src, {size: 800})
                    .toPromise()
                    .then(function (result) {
                        document.querySelector('input.isbn').value = result.codeResult.code;
                    })
                    .catch(function () {
                        document.querySelector('input.isbn').value = "Not Found";
                    })
                    .then(function () {
                        this.attachListeners();
                    }.bind(this));
        },
        attachListeners: function () {
            var self = this,
                    button = document.querySelector('.input-field input + .button.scan'),
                    fileInput = document.querySelector('.input-field input[type=file]');

            button.addEventListener("click", function onClick(e) {
                e.preventDefault();
                button.removeEventListener("click", onClick);
                document.querySelector('.input-field input[type=file]').click();
            });

            fileInput.addEventListener("change", function onChange(e) {
                e.preventDefault();
                fileInput.removeEventListener("change", onChange);
                if (e.target.files && e.target.files.length) {
                    self.decode(URL.createObjectURL(e.target.files[0]));
                }
            });
        }


    }
}

function CRMService($q, URL_SERVICE) {
    return {
        login: function (username, password,type) {
            console.log(username, password);
            var defer = $q.defer();
            $.post(URL_SERVICE + '/service/checkLogin', {
                username: username, password: password,
                type : type
            }, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getPointTypes: function () {
            var defer = $q.defer();
            $.post(URL_SERVICE + '/service/GetPointTypes', {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getProfile: function (serialCode) {
            var defer = $q.defer();
            $.post(URL_SERVICE + '/site/profile/' + serialCode, {}, function (response) {
                defer.resolve(response);
            }, 'html').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        confirmCart: function (cartInfo) {
            var defer = $q.defer();
            $.post(URL_SERVICE + '/service/confirmCart', cartInfo, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getStores: function () {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetStores', {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getProducts: function (input) {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetProducts/' + input, {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getCustomers: function (code) {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetCustomers/' + code, {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        saveSales: function (customer, products) {
            var defer = $q.defer();
            $.post(URL_SERVICE + '/service/SaveSales', {
                customer: JSON.stringify(customer),
                products: JSON.stringify(products)
            }, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getCustomer: function (code) {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetCustomer/' + code, {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
        getMenus: function (code) {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetMenus/' + code, {}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
                defer.reject(e);
            });
            return defer.promise;
        },
    }
}

function FacebookService($q) {
    return {
        init: function () {
            var deferred = $q.defer();
            if (true) {
                deferred.resolve('ssssssss');
            } else {
                deferred.reject('xxxxxxx');
            }
            return deferred.promise;
        }
    }
}

