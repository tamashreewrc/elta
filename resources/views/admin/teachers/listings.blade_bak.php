@extends('admin.layout.dashboard_layout')
@section('content')

 <section class="content-header">
   <h1>Teachers
     <!-- Dashboard -->
      <!-- <small> -->
       <!--  <div class="box-footer">
            <a href="javascript:void(0)"><button type="button" id="add_teacher" class="btn btn-success m-r-5 m-b-5">Add Teachers</button></a>
        </div> -->
    <!-- <a href="javascript:void(0)"><button type="button" id="add_teacher" class="btn btn-success m-r-5 m-b-5">Add Teachers</button></a> -->
      <!-- </small> -->
      </h1>
       <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/teachers">Teachers</a></li>
       </ol>
  </section>

<section class="content">
  <div class="row">
   <div class="col-xs-12">
   	<div class="box">
      <div class="box-header clearfix">
         <h3 class="box-title">All Teachers Records</h3>
          <a title="Add Teachers" href="javascript:void(0)" id="add_teacher" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
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
             <th>Image</th>
             <th>Name</th>
             <th>Designation</th>
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
            @foreach($fetch_all_teacher as $key => $value)
            <tr class="odd gradeX">
                <!-- <td>{{ ++$key }}</td> -->
                <td><img src="{{ url('upload/teachers_image/resize/'.$value['image']) }}" style="width: 75px;height: 75px;" class="img-circle pull-left image"></td>
                <td>{{ ucwords($value['name']) }}</td>
                <td>{{ $value['designation'] }}</td>
                <td>
                    <a title="Edit" class="btn btn-primary btn-sm edit_teachers_modal" data-id="{{$value['id']}}"><i class="fa fa-pencil"></i></a>

                    <a title="Delete" href="/admin/teacher/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Add Teachers</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="add_teachers_form" id="add_teachers_form" action="javascriot:void(0)" enctype="multipart/form-data">
        {{csrf_field()}} 
            <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="teachers_name" name="teachers_name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Designation</label>
                <input type="text" class="form-control" id="teachers_designation" name="teachers_designation" placeholder="Enter Designation">
                </div>
                <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" id="teachers_image" name="teachers_image">
                </div>
            </div>
        <!-- /.box-body -->

            <div class="box-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="add_teachers_submit" class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
    </div>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="teacher-modal-edit-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Edit Teachers</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="Edit_teachers_form" id="Edit_teachers_form" action="javascriot:void(0)" enctype="multipart/form-data">
        {{csrf_field()}} 
            <input type="hidden" name="edit_row_id" id="edit_row_id" value="">
            <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="teachers_name_edit" name="teachers_name_edit" placeholder="Enter Name">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Designation</label>
                <input type="text" class="form-control" id="teachers_designation_edit" name="teachers_designation_edit" placeholder="Enter Designation">
                </div>

                <div class="form-group">
                    @if(!empty($value['image']))
                        <img src="" style="width: 75px;height: 75px;" class="img-circle pull-left image show_teachers_image">
                    @endif
                
                <input type="hidden" name="exist_teacher_image" id="exist_teacher_image" value="">
                </div>

                <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" id="teachers_image_id" name="teachers_image_id">
                </div>
            </div>
        <!-- /.box-body -->

            <div class="box-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="edit_teachers_submit" class="btn btn-primary pull-right">Submit</button>
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