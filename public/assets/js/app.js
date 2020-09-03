$(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('body').on("click", ".dropdown-menu", function (e) {
        $(this).parent().is(".open") && e.stopPropagation();
    });
});