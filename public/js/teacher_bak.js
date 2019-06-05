$(document).ready(function () {
    $('#add_teacher').on('click', function () {
        $("#modal-default").modal("show");
    });

    $("#add_teachers_submit").on('click', function (e) {
        var valid = $('#add_teachers_form').valid();
        if(valid) {
            e.preventDefault();
            var formData = new FormData($('#add_teachers_form')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/teachers/add",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success : function (resp){
                    if(resp == 1) {
                        $.alert({
                            title: 'Confirmation!',
                            content: 'Teacher added successfully.',
                            // icon: 'fa fa-rocket',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                Yes: {
                                    // text: 'Okay',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        window.location.href = '/admin/teachers';
                                    }
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $('.edit_teachers_modal').on('click', function () {
        var row_id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/admin/teacher/fetch_individuals_details",
            data:{
                row_id : row_id
                // _token: '{{csrf_token()}}'
            },
            success: function (resp) {
                $('#edit_row_id').val(resp.id);
                $('#teachers_name_edit').val(resp.name);
                $('#teachers_designation_edit').val(resp.designation);
                $('#exist_teacher_image').val(resp.image);
                $('.show_teachers_image').attr('src',"../upload/teachers_image/resize/"+resp.image);
                $("#teacher-modal-edit-default").modal("show");
            }
        });
    });

    $('#edit_teachers_submit').on('click', function (e) {
        var valid = $('#Edit_teachers_form').valid();
        if(valid) {
            e.preventDefault();
            var formData = new FormData($('#Edit_teachers_form')[0]);
            var row_id = $('#edit_row_id').val();
            $.ajax({
                type: "POST",
                url: "/admin/teachers/edit/" + row_id,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success : function (resp){
                    if(resp == 1) {
                        $.alert({
                            title: 'Confirmation!',
                            content: 'Teacher edited successfully.',
                            // icon: 'fa fa-rocket',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                Yes: {
                                    // text: 'Okay',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        window.location.href = '/admin/teachers';
                                    }
                                }
                            }
                        });
                    }
                }
            });
        }
    });

    $("#add_teachers_form").validate({
        rules:{
            teachers_name: {
                required: true
            },
            teachers_designation:{
                required: true
            },
            teachers_image : {
                required: true
            }
        },
        messages:{
            teachers_name: {
                required: "<font color='red'>Please enter your full name.</font>"
            },
            teachers_designation:{
                required: "<font color='red'>Please enter your designation.</font>"
            },
            teachers_image : {
                required: "<font color='red'>Please upload your image.</font>"
            }
        }
    });
    $("#Edit_teachers_form").validate({
        rules:{
            teachers_name_edit: {
                required: true
            },
            teachers_designation_edit:{
                required: true
            }
        },
        messages:{
            teachers_name_edit: {
                required: "<font color='red'>Please enter your full name.</font>"
            },
            teachers_designation_edit:{
                required: "<font color='red'>Please enter your designation.</font>"
            }
        }
    });
});