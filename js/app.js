var app = angular.module('crmApp', []);

//app.constant('URL_SERVICE', 'http://localhost/CRM');
app.constant('URL_SERVICE', YII_URL_SERVICE);

app.run(function () {
    $(".datepicker").datepicker({dateFormat: "dd/mm/yy"});
    $('.ui.dropdown').dropdown()
            .dropdown({transition: 'drop'}).dropdown({on: 'hover'});
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

    //*************** Datatable Default Config *********************
    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "sProcessing": "กำลังดำเนินการ...",
            "sLengthMenu": "แสดง_MENU_ แถว",
            "sZeroRecords": "ไม่พบข้อมูล",
            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
            "sInfoPostFix": "",
            "sSearch": "ค้นหา:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "เิริ่มต้น",
                "sPrevious": "ก่อนหน้า",
                "sNext": "ถัดไป",
                "sLast": "สุดท้าย"
            }
        }
    });
    $('.table.celled').DataTable();
    //*************** Datatable Default Config *********************

});


