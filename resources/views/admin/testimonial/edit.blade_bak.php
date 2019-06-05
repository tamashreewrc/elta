@extends('admin.layout.dashboard_layout')
@section('content')

 <section class="content-header">
   <h1>
     Tesimonials
      </h1>
       <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/testimonial">Testimonial</a></li>
       </ol>
  </section>

<section class="content">
   	 <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">Edit Testimonial</h3>
            <!-- <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
           </div> -->
          </div>

       <form method="POST" action="/admin/testimonial_edit/{{$testimonial_details['id']}}" name="testimonial_edit_form" id="testimonial_edit_form" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="box-body">
           <div class="row">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('testimonial_description') ? 'has-error' : '' }}">
              <label>Description</label>
              <input type="text" class="form-control" name="testimonial_description" placeholder="Enter Description" value='{{$testimonial_details['description']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('testimonial_description') }}</span>
              </div>
               <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
              <label>Author</label>
              <input type="text" class="form-control" name="author" placeholder="Enter name of the Author" value='{{$testimonial_details['author_name']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('author') }}</span>
              </div>
              <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
              <label>Designation</label>
              <input type="text" class="form-control" name="designation" placeholder="Enter the Designation" value='{{$testimonial_details['designation']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('designation') }}</span>
              </div>
              <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
              <label>Name of the Company</label>
              <input type="text" class="form-control" name="company" placeholder="Enter the Company" value='{{$testimonial_details['company_name']}}'>
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('company') }}</span>
              </div>
              <div class="form-group{{ $errors->has('') ? 'has-error' : '' }}">
              <label>Image of the Author</label>
              <?php if ($testimonial_details['author_image']) {?>
              <br><img src="{{ url('upload/testimonial/resize/'.$testimonial_details['author_image'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
              <input type="file" name="author_image">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('author_image') }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="admin_settings_submit">Submit</button>
        </div>
      </form>
    </div>

 </section>


@endsection