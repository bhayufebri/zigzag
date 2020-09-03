$(document).ready(function() {
    $('#table-modal').DataTable({
            processing:true,
            serverside:true,
            lengthChange:false,
            pageLength:3,
            order: [[0, 'asc']],
            columnDefs:[
                {
                    targets: 0,
                    "orderable": false,
                    "bSearchable": false
                },
                {
                    targets: 2,
                    "orderable": false,
                    "bSearchable": false
                }
            ],
            "language": {
                "paginate": {
                  "previous": "<",
                  "next": ">"
                },
                "lengthMenu": "Tampilkan _MENU_ data",
                "zeroRecords": "Data Tidak Ada",
                "sInfo": "_TOTAL_ data logs",
                "sSearch": "Cari:",
                "infoEmpty": "Data Tidak Tersedia",
                "infoFiltered": "(pencarian dari _MAX_ total data)",
                "processing": "Sedang Memproses..."
            }
        });
    $(document).on("click", ".js-settlement-approve-confirm", function(event) {
        event.preventDefault();
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
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
            title: "Anda yakin ?",
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
            title: "Anda yakin ?",
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
            title: "Anda yakin ?",
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

    $(document).on("click", ".js-user-corporate-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "To Update the Corporate Type?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = $href;
            }
        });
    });

    $(document).on("click", ".js-user-account-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "To Update the Bank Account?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = $href;
            }
        });
    });

    $(document).on("click", ".js-user-approve-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "To Update the Approve Type?",
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
            title: "Anda yakin ?",
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
    $(document).on("click", ".js-promo-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Promo Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });
    $(document).on("click", ".js-fee-mdr-delete-confirm", function(event) {
        event.preventDefault();
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Promo MDR Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-voucher-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Voucher Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-broadcast-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Broadcast ini ?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-cashback-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Cashback Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-userSetting-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Pengguna Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-voucher-create-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $ee = document.form1.start_date.value;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Promo Ini? " + $ee,
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-paymenttype-delete-confirm", function(event) {
        event.preventDefault();
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Biaya MDR Ini?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-vouchertype-delete-confirm", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Delete Voucher Type?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-broadcasttypes-delete-confirm", function(
        event
    ) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Delete Broadcast Type?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-vouchermerchant-delete-confirm", function(
        event
    ) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $form = $(this).closest("form");
        var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text: "Menghapus Voucher Mitra?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
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
            title: "Anda yakin ?",
            text: "Menghapus Promo? " + $ee,
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $form.submit();
            }
        });
    });

    $(document).on("click", ".js-update-status-daily", function(event) {
        event.preventDefault();
        document.getElementsByName("status").value = 0;
        var $href = $(this).attr("href");
        // var $form = $(this).closest('form');
        // var $el = $(this);
        swal({
            title: "Anda yakin ?",
            text:
                "To update set paid on this daily settlement date and send the email?",
            icon: "",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = $href;
            }
        });
    });
});

function isNumberKey(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if (
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 188]) !== -1 ||
        // Allow: Ctrl+A,Ctrl+C,Ctrl+V, Command+A
        ((e.keyCode == 65 ||
            e.keyCode == 86 ||
            e.keyCode == 67 ||
            e.keyCode == 88 ||
            e.keyCode == 90 ||
            e.keyCode == 89) &&
            (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)
    ) {
        // let it happen, don't do anything
        return;
    }

    // Ensure that it is a number and stop the keypress
    if (
        (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
        (e.keyCode < 96 || e.keyCode > 105)
    ) {
        e.preventDefault();
    }
}
$(document).on("click", ".js-merchant-delete-confirm", function(event) {
    event.preventDefault();
    document.getElementsByName("status").value = 0;
    var $href = $(this).attr("href");
    // var $form = $(this).closest('form');
    // var $el = $(this);
    swal({
        title: "Anda yakin?",
        text: "Menghapus Mitra.",
        icon: "",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            window.location.href = $href;
        }
    });
});

$(document).on("click", ".js-dailysettlement-email-paid-confirm", function(
    event
) {
    event.preventDefault();
    document.getElementsByName("status").value = 0;
    var $ee = $("#date_settlement").val();
    // var $href = $(this).attr('href');
    var $form = $(this).closest("form");

    // var $el = $(this);
    swal({
        title: "Anda yakin?",
        text: "Ubah Status Bayar pada tanggal " + $ee,
        icon: "",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            $form.submit();
        }
    });
});

$(document).on("click", ".js-true-money-upload-csv-confirm", function(event) {
    event.preventDefault();
    document.getElementsByName("status").value = 0;
    // var $href = $(this).attr('href');
    var $form = $(this).closest("form");
    // var $el = $(this);
    swal({
        title: "Anda yakin?",
        text: "Unggah csv akan berpengaruh pada status pembayaran.",
        icon: "",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            $form.submit();
        }
    });
});
