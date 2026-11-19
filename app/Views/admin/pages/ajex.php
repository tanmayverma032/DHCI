

 <script>

$(".status").click(function() {
    var csrfName = $('input[name=csrf_test_name]').attr('name');
    var csrfHash = $('input[name=csrf_test_name]').val(); 
    var id = $(this).parents("tr").attr("id");

    if (id != "") {
        jQuery.ajax({
            type: "POST",
            url: statusChange,
            dataType: "json",
            data: {
                id: id,
                [csrfName]: csrfHash
            },
            success: function(res) {
                $('input[name=csrf_test_name]').val(res['token']);
                toastr.success("Status Successfully Change!", "Success!", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                });
            },
            error: function(error) {
                toastr.error("Status Not Change!", "Eror!", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    progressBar: !0
                });
            }
        });
    }
});


$(".confirm-delete").on("click", function() {
    var csrfName = $('input[name=csrf_test_name]').attr('name');
    var csrfHash = $('input[name=csrf_test_name]').val(); 
    var id = $(this).parents("tr").attr("id");
    Swal.fire({
        title: 'Are you sure to delete ?',
        text: "You will not be able to recover this imaginary file !!",
        type: "warning",
        showCancelButton: !0, 
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Yes, delete it!'
    }).then(function(t) {
        if (t.value && Swal.fire) {
            $.ajax({
                type: "POST",
                url: deleteData,
                dataType: 'json',
                data: {
                    id: id,[csrfName]: csrfHash
                },
                error: function() {
                    toastr.error("Something is wrong", "Eror!", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0
                    });
                },
                success: function(data) {
                    $('input[name=csrf_test_name]').val(data['token']);
                    $("#" + id).remove();
                    toastr.success("Deleted Successfully!", "Success!", {
                        closeButton: !0,
                        tapToDismiss: !1,
                        progressBar: !0
                    });
                }
            });

        }

    });
});





$(".editData,.viewData").on("click", function() {
    var id = $(this).parents("tr").attr("id");
    if($(this).hasClass('viewData')){
        $("#exampleModal1").find('input').attr('disabled','disabled');
    } else {
        $("#exampleModal1").find('input').removeAttr('disabled');
    }
    if (id != "") {
        jQuery.ajax({
            type: "GET",
            url: showdata+id,
            dataType: 'html',
           
            success: function(data) {
                $('#academic_detail').html(data);
                $("#exampleModal1").modal("show");
            }
        });
    }
    
});


</script> 

