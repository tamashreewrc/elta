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
                url: "./teachers/add",
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
                                        window.location.href = './teachers';
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
            url: "./teacher/fetch_individuals_details",
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
                url: "./teachers/edit/" + row_id,
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
                                        window.location.href = './teachers';
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


     $("#teachers_image").on('change', function() { 
             var flag;
             
             if($("#teachers_image").val()!=''){ 
               var files = $('#teachers_image')[0].files;
               var ext = files[0].name.split('.').pop().toLowerCase();
               var size = files[0].size;
     
               flag =  ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'svg']) == -1) ? 0 : 1;
              

                /* if(size >= 2097152){
                 $('label[for=teachers_image]').html('');
                 $('label[for=teachers_image]').append('<font color="red">Please upload file within 2MB</font>');
                 $("#teachers_image").val('');
                 flag=0;
                } */

               if(flag==0){ 
                $('label[for=teachers_image]').html('');
                $("#teachers_image").val('');
               }   
               
               else{ 
                $("#teachers_image").removeClass("error");
                $("#teachers_image").addClass("valid");
                $('label[for=teachers_image]').css("display","none");
               }

            }

        });


     $("#teachers_image_id").on('change', function() { 
             var flag=1;
             
             if($("#teachers_image_id").val()!=''){ 
               var files = $('#teachers_image_id')[0].files;
               var ext = files[0].name.split('.').pop().toLowerCase();
               var size = files[0].size;
     
               flag =  ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'svg']) == -1) ? 0 : 1;
              

                /* if(size >= 2097152){
                 $('label[for=teachers_image_id]').html('');
                 $('label[for=teachers_image_id]').append('<font color="red">Please upload file within 2MB</font>');
                 $("#teachers_image_id").val('');
                 flag=0;
                } */

               if(flag==0){ 
                $("#teachers_image_id").val('');
               }   
               
            }

        });

});