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
  <div class="row">
   <div class="col-xs-12">
   	<div class="box">
      <div class="box-header clearfix">
         <h3 class="box-title">All Testimonial Records</h3>
         <a title="Add Testimonial" href="/admin/testimonial/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
      </div>

       <div class="box-body">
        @if(Session::has('submit-status'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {{ Session::get('submit-status') }}
                </div>
            @endif
        <div class="table-responsive">     
         <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
             <!-- <th>Id</th>  -->
             <th>Description</th>
             <th>Name of the Author</th>
             <th>Designation</th>
             <!-- <th>Image</th>  -->
             <th>Company</th>
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
              @foreach($all_testimonials as $key => $value)
              <tr>
              <!-- <td>{{++$key}}</td>   -->
              <td>{{$value['description']}}</td>
              <td>{{$value['author_name']}}</td>
              <td>{{$value['designation']}}</td>
              <!-- <td><img src="{{ url('upload/testimonial/resize/'.$value['author_image']) }}" style="width: 75px;height: 75px;" class="img-circle pull-left image"></td> -->
              <td>{{$value['company_name']}}</td>
              <td colspan="2"><a title="Edit" href="/admin/testimonial/edit/{{$value['id']}}" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
               <a title="Delete" href="/admin/testimonial/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td>
             </tr>
              @endforeach
                </tbody>
               </div> 
              </table>
            </div>
          </div>
   </div>
</div>
 </section>


@endsection
