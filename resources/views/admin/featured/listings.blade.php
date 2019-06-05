@extends('admin.layout.dashboard_layout')
@section('content')

 <section class="content-header">
   <h1>
     <!-- Dashboard -->
      <!-- <small> -->
        <div class="box-footer">
            <a href="javascript:void(0)"><button type="button" id="add_featured_program_workshop" class="btn btn-success m-r-5 m-b-5">Add Featured Program & Workshop</button></a>
        </div>
      <!-- </small> -->
      </h1>
       <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/features">Featured Program & Workshop</a></li>
       </ol>
  </section>

<section class="content">
  <div class="row">
   <div class="col-xs-12">
   	<div class="box">
      <div class="box-header">
         <h3 class="box-title">All Featured Program & Workshop Records</h3>
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
         <table id="featured_program_table" class="table table-bordered table-striped">
          <thead>
            <tr>
             <th>Image</th>
             <th>Title</th>
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
            @foreach($fetch_all as $key => $value)
            <tr class="odd gradeX">
                <!-- <td>{{ ++$key }}</td> -->
                <td><img src="{{ url('upload/featured_image/resize/'.$value['img']) }}" style="width: 75px;height: 75px;" class="img-circle pull-left image"></td>
                <td>{{ ucwords($value['title']) }}</td>
                <td>
                    <a title="Edit" class="btn btn-primary btn-sm edit_features_modal" data-id="{{$value['id']}}"><i class="fa fa-pencil"></i></a>

                    <a title="Delete" href="/admin/feature/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
       </div> 
      </div>
     </div>
    </div>
   </div>
 </section>	

<div class="modal fade" id="modal-default-add">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Add Featured Program & Workshop</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="add_featured_program_workshops_form" id="add_featured_program_workshops_form" action="javascriot:void(0)" enctype="multipart/form-data">
        {{csrf_field()}} 
            <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="featured_title" name="featured_title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" id="featured_image" name="featured_image">
                </div>
            </div>
        <!-- /.box-body -->

            <div class="box-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="add_featured_program_workshops_submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
    </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="feature-modal-edit-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Featured Program & Workshop</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="Edit_features_form" id="Edit_features_form" action="javascriot:void(0)" enctype="multipart/form-data">
        {{csrf_field()}} 
            <input type="hidden" name="edit_row_id" id="edit_row_id" value="">
            <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="featured_title_edit" name="featured_title_edit" placeholder="Enter Name">
                </div>

                <div class="form-group">
                @if(!empty($value['img']))
                    <img src="" style="width: 75px;height: 75px;" class="img-circle pull-left image show_featured_image">
                @endif
                <input type="hidden" name="exist_featured_image" id="exist_featured_image" value="">
                </div>

                <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" id="featured_image_id" name="featured_image_id">
                </div>
            </div>
        <!-- /.box-body -->

            <div class="box-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="edit_features_submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
    </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
        <!-- /.modal -->
@endsection