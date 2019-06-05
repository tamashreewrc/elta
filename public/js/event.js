
    CKEDITOR.replace('event_description');

    
    $(document).ready(function() {
   
       var formdata = new FormData();
       var iCntVdo = 1;
           
         $('.add_div_event_video').on('click', function () {

         	iCntVdo = iCntVdo + 1;
            $('#dynamic-div-video').append('<div id="video-'+iCntVdo+'" class="form-group"><input type="text" name="event_video[]" id="event_video_'+iCntVdo+'" class="form-control video_name" placeholder="Enter video link of event"/></div>');
         	 $('.remove_div_event_video').css('visibility', 'visible');
         	 return false;
         });  

        $('.remove_div_event_video').on('click', function () {
                if (iCntVdo != 1) {
                    $('#video-'+iCntVdo).remove();
                    iCntVdo = iCntVdo - 1;
                }
                if (iCntVdo == 1) $('.remove_div_event_video').css('visibility', 'hidden');
                return false;
            });



         $("#event_image").on('change', function() { 
             var flag=1;
             
             if($("#event_image").val()!=''){ 
               var files = $('#event_image')[0].files;
               var len = $('#event_image').get(0).files.length;

               for (var i=0;i<len;i++) {
                 image_file = files[i];
                 var ext = image_file.name.split('.').pop().toLowerCase();
                 var size = this.files[i].size;
             
                 if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'svg']) == -1) {
                    $("#event_image").val('');
                    flag=0;
                    break;
                }

                 /*if(size >= 2097152){
                    $("#event_image").val('');
                    flag=0;
                    break;
                 }*/
               }
             }

           });       
        });




