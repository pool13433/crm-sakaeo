var app = angular.module('crmApp', []);

app.constant('URL_SERVICE','http://localhost/CRM');

app.run(function () {
    $(".datepicker").datepicker({dateFormat: "dd/mm/yy"});
    $('.ui.dropdown').dropdown()
    .dropdown({transition: 'drop' }).dropdown({ on: 'hover' });
    $('.ui.rating').rating();

    $('.sidebar-toggle').on('click', function () {
        $('.menu.sidebar').sidebar('setting', {
            transition: 'overlay',
            closable: true,
        }).sidebar('toggle');
    });
    $('.sidebar-toggle-close').on('click', function () {
        $('.menu.sidebar').sidebar('setting', {
            transition: 'overlay',
            closable: true,
        }).sidebar('toggle');
    });

});


