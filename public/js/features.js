$(document).ready(function () {
    $('#featured_program_table').DataTable();
    
    $('#add_featured_program_workshop').on('click', function () {
        $('#modal-default-add').modal('show');
    });

    $('#add_featured_program_workshops_submit').on('click', function (e) {
        var valid = $('#add_featured_program_workshops_form').valid();
        if(valid){
            e.preventDefault();
            var formData = new FormData($('#add_featured_program_workshops_form')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/features/add",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success : function (resp){
                    if(resp == 1) {
                        $.alert({
                            title: 'Confirmation!',
                            content: 'Featured Program & Workshop added successfully.',
                            // icon: 'fa fa-rocket',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                Yes: {
                                    // text: 'Okay',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        window.location.href = '/admin/features';
                                    }
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $('#add_featured_program_workshops_form').validate({
        rules: {
            featured_title : {
                required : true
            },
            featured_image : {
                required : true
            }
        },
        messages: {
            featured_title : {
                required : "<font color='red'>Please enter title.</font>"
            },
            featured_image : {
                required : "<font color='red'>Please upload image.</font>"
            }
        }
    });

    $('.edit_features_modal').on('click', function () {
        var row_id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/admin/features/fetch-individuals",
            data:{
                row_id : row_id
            },
            success : function (resp) {
                $('#edit_row_id').val(resp.id);
                $('#featured_title_edit').val(resp.title);
                $('#exist_featured_image').val(resp.img);
                $('.show_featured_image').attr('src',"../upload/featured_image/resize/"+resp.img);
                $("#feature-modal-edit-default").modal("show");
            }
        });
    });

    $('#edit_features_submit').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#Edit_features_form')[0]);
        var row_id = $('#edit_row_id').val();
        $.ajax({
            type: "POST",
            url: "/admin/features/edit/" + row_id,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success : function (resp){
                if(resp == 1) {
                    $.alert({
                        title: 'Confirmation!',
                        content: 'Edited successfully.',
                        // icon: 'fa fa-rocket',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        buttons: {
                            Yes: {
                                // text: 'Okay',
                                btnClass: 'btn-blue',
                                action: function () {
                                    window.location.href = '/admin/features';
                                }
                            }
                        }
                    });
                }
            }
        });
    });
});