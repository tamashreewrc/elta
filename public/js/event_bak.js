
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
                   
        });




