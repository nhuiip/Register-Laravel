$(document).ready(function() {
    $("#dataTable").dataTable({
        ordering: false,
        lengthChange: false,
        pageLength: 25
    });

    $(".datepicker").datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        setDate: new Date(),
        autoclose: true,
        format: "yyyy-mm-dd"
    });
});
