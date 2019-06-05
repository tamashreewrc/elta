@extends('admin.layout.dashboard_layout')

@section('content')



<section class="content-header">

  <h1>

   Client

  </h1>

  <ol class="breadcrumb">

   <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

   <li class="active"><a href="{{ url('/') }}/admin/client">Client</a></li>

  </ol>

 </section>            



<section class="content">

     <div class="box box-default">

            <div class="box-header with-border">

            <h3 class="box-title">Edit Client</h3>

            <!-- <div class="box-tools pull-right">

             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

           </div> -->

          </div>



       <form method="POST" action="{{ url('/') }}/admin/client_edit/{{$client_details['id']}}" name="client_edit_form" id="client_edit_form" enctype="multipart/form-data">

            {{ csrf_field() }}

           <div class="box-body">

           <div class="row">      

            <div class="col-md-6">         

              <div class="form-group {{ $errors->has('client_name') ? 'has-error' : '' }}">

              <label>Name of the Client</label>

              <input type="text" class="form-control" name="client_name" placeholder="Enter the name of client" value='{{$client_details['name']}}'>

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('client_name') }}</span>

              </div>

              <div class="form-group {{ $errors->has('client_image') ? 'has-error' : '' }}">

              <label>Upload image of the Client</label>

              <?php if($client_details['image']){?>

              <br><img src="{{ url('upload/client/resize/'.$client_details['image'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php } ?>

              <input type="file" name="client_image">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('client_image') }}</span>

              </div>

            </div> 

          </div>

        </div>

        <div class="box-footer">

         <button type="submit" class="btn btn-primary" id="admin_client_submit">Submit</button>

        </div>

      </form> 

    </div>



 </section>





@endsection