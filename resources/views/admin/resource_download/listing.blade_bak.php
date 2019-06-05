@extends('admin.layout.dashboard_layout')
@section('content')

<section class="content-header">
  <h1>
   Resource Download
  </h1>
  <ol class="breadcrumb">
   <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a href="/admin/download">Resource Download</a></li>
  </ol>
 </section>

<section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
      <div class="box-header clearfix">
         <h3 class="box-title">All Resource Downloads</h3>
         <a title="Add Download" href="/admin/download/add" class="btn btn-success add_all_pages pull-right"><i class="fa fa-plus"></i></a>
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
             <th>SL No.</th>
             <th>Title</th>
             <th>Subtitle</th>
             <th>Author</th>
             <th>Uploaded Book</th>
             <th>Uploaded Note</th>
             <th>Action</th>
            </tr>
           </thead>
            <tbody>
              @foreach($all_downloads as $key => $value)
              <tr>
              <td>{{++$key}}</td>
              <td>{{$value['title']}}</td>
              <td>{{$value['subtitle']}}</td>
              <td>{{$value['author']}}</td>
              <td><a class="resource-download" href="{{ url('upload/resource_download/books/'.$value['book']) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a></td>
              <td><a class="resource-download" href="{{ url('upload/resource_download/notes/'.$value['note']) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a></td>
              <td colspan="2"><a title="Edit" href="/admin/download/edit/{{$value['id']}}" class="btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
               <a title="Delete" href="/admin/download/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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


@endsection
