$(document).ready(function() {
    $(document).on("click", ".js-settlement-approve-confirm", function(event) {
        event.preventDefault();
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Would you like to approve this settlement request?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                //console.log($form);
                document.getElementById("inputStatus").value = 1;
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-settlement-reject-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Would you like to reject this settlement request?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                document.getElementById("inputStatus").value = 0;
                $form.submit();
            }
        });
    });
    $(document).on("click", ".js-settlement-paid-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Set settlement to paid?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });
    $(document).on("click", ".js-user-banned-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Set user to banned?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = $href;
            }
        });
    });
    $(document).on("click", ".js-user-unbanned-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Set user to unbanned?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = $href;
            }
        });
    });

    $(document).on("click", ".js-promo-create-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $ee = document.form1.start_date.value;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Are you sure?",
            text: "Delete Promotion? " + $ee,
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    // ----------------------------------------------------baru----------------------------------------
});
