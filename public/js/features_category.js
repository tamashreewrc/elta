$(document).ready(function () {

 $("#featured_box_add").val(0); 

 $("#parent_category_id").change(function() {

   var featured_category_add = "";
   
   $("#parent_category_id option:selected").each(function() {
      featured_category_add += $(this).text();
    });
   
   if(featured_category_add == "This is the main category"){
    $("#featured_category_add").css("display","none");
    $("#featured_box_add").val(0);
   }
   else{
    $("#featured_category_add").css("display","block");

    if($("#featured_box_add").is(':checked')){ 
     $("#featured_box_add").val(1);
    }
    else{
      $("#featured_box_add").val(0);
    }
   }
  }); 

 $("#parent_category_id").change(function() {

   var featured_category_edit = "";
 
   $("#parent_category_id option:selected").each(function() {
      featured_category_edit += $(this).text();
    });
   
   if(featured_category_edit == "This is the main category"){
    $("#featured_category_edit").css("display","none");
    $("#featured_box_edit").removeAttr('checked');
    $("#featured_box_edit").val(0);
   }
   else{
    $("#featured_category_edit").css("display","block");
 
    featured_category = $("#featured_box_edit").val(); 

    if(featured_category == 1){  
     $("#featured_box_edit").prop('checked',true);
    }
    else{
     $("#featured_box_edit").prop('checked',false);
    }
   }
  }); 

 $("#featured_box_add").change(function() { 

  if($(this).is(":checked")) {
   $(this).val(1);
  } 
  else{
   $(this).val(0);
  }

 });

 $("#featured_box_edit").change(function() {

  if($(this).is(":checked")) { 
   $(this).val(1);
  } 
  else{
   $(this).removeAttr('checked'); 
   $(this).val(0);
  }

 });

}); 