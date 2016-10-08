app.service('FacebookService', FacebookService)
        .service('CRMService', CRMService);
function CRMService($q, URL_SERVICE) {
    return {
        login: function (username, password) {
            console.log(username, password);
            var defer = $q.defer();
            $.post(URL_SERVICE + '/service/checkLogin', {username: username, password: password}, function (response) {
                defer.resolve(response);
            }, 'json').fail(function (e) {
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
        getStores : function () {
            var defer = $q.defer();
            $.get(URL_SERVICE + '/service/GetStores', {}, function (response) {
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

