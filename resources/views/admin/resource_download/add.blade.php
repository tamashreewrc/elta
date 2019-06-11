@extends('admin.layout.dashboard_layout')

@section('content')



<section class="content-header">

  <h1>

   Resource Download

  </h1>

  <ol class="breadcrumb">

   <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

   <li class="active"><a href="{{ url('/') }}/admin/download">Resource Download</a></li>

  </ol>

 </section>            



<section class="content">

     <div class="box box-default">

            <div class="box-header with-border">

            <h3 class="box-title">Add Download</h3>

            <!-- <div class="box-tools pull-right">

             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

           </div> -->

          </div>

       <form method="POST" action="{{ url('/') }}/admin/download_add" name="download_add_form" id="download_add_form" enctype="multipart/form-data">

            {{ csrf_field() }}

           <div class="box-body">

           <div class="row">      

            <div class="col-md-6">         

              <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

              <label>Title</label>

              <input type="text" class="form-control" name="title" placeholder="Enter the title">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('title') }}</span>

              </div>

              <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : '' }}">

              <label>Subtitle</label>

              <input type="text" class="form-control" name="subtitle" placeholder="Enter the subtitle">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('subtitle') }}</span>

              </div>

              <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">

              <label>Author</label>

              <input type="text" class="form-control" name="author" placeholder="Enter the author">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('author') }}</span>

              </div>

              <div class="form-group {{ $errors->has('book') ? 'has-error' : '' }}">

              <label>Upload Book</label>

              <input type="file" name="book">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('book') }}</span>

              </div>

              <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">

              <label>Upload Note</label>

              <input type="file" name="note">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('note') }}</span>

              </div>

            </div> 

          </div>

        </div>

        <div class="box-footer">

         <button type="submit" class="btn btn-primary" id="admin_download_submit">Submit</button>

        </div>

      </form> 

    </div>



 </section>



@endsection