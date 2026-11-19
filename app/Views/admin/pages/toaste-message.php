<script>

<?php if (session()->has("error")) {?>
toastr.error("<?=strtoupper( session()->get("error"))?>", "Error!", {
    positionClass: "toast-bottom-left",
    timeOut: 5e3,
    closeButton: !0,
    debug: !1,
    newestOnTop: !0,
    progressBar: !0,
    preventDuplicates: !0,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: !1
});
<?php } ?>
<?php if (session()->has("info")) {?>
toastr.info("<?=strtoupper( session()->get("info"))?>", "Welcome!", {
    positionClass: "toast-bottom-left",
    timeOut: 5e3,
    closeButton: !0,
    debug: !1,
    newestOnTop: !0,
    progressBar: !0,
    preventDuplicates: !0,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: !1
});
<?php  } ?>
<?php if (session()->has("warning")) {?>
    toastr.warning("<?=strtoupper( session()->get("warning"))?>", "Warning!", {
            positionClass: "toast-bottom-left",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        });
<?php  } ?>
<?php if (session()->has("success")) {?>
    toastr.success("<?=strtoupper( session()->get("success"))?>", "Success!", {
        positionClass: "toast-bottom-left",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    });
<?php  } ?>

</script>
