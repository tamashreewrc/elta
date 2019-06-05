@extends('admin.layout.dashboard_layout')

@section('content')



<section class="content-header">

  <h1>

   Event

  </h1>

  <ol class="breadcrumb">

   <li><a href="{{ url('/') }}/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

   <li class="active"><a href="{{ url('/') }}/admin/client">Client</a></li>

  </ol>

 </section>            



<section class="content">

     <div class="box box-default">

            <div class="box-header with-border">

            <h3 class="box-title">Edit Event</h3>

            <!-- <div class="box-tools pull-right">

             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

           </div> -->

          </div>



       <form method="POST" action="{{ url('/') }}/admin/event_update/{{$event_details['id']}}" name="event_edit_form" id="event_edit_form" enctype="multipart/form-data"> 

            {{ csrf_field() }}

           <div class="box-body">

           <div class="row">      

            <div class="col-md-6">         

              <div class="form-group {{ $errors->has('event_name') ? 'has-error' : '' }}"> 

              <label>Name of the Event</label>

              <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Enter the name of event" value="{{$event_details['name']}}">

              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('event_name') }}</span>

              </div><br>

            </div> 

            <div class="col-md-12">

              <div class="form-group {{ $errors->has('event_description') ? 'has-error' : '' }}">           

                <label>Event Description</label>

                <textarea class="form-control {{ $errors->has('event_description') ? 'has-error' : '' }}" name="event_description" id="event_description" rows="8" placeholder="Enter description">{{$event_details['description']}}</textarea><span class="input-group col-md-4" style="color: red;">{{ $errors->first('event_description') }}</span><br>

              </div> 

              <div class="form-group {{ $errors->has('event_image') ? 'has-error' : '' }}">

               <label>Upload image of the Event</label>

               <input type="file" name="event_image[]" id="event_image" onchange="handleImgs();"multiple>

               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('event_image') }}</span>

              </div><br>

            </div> 

            <div class="form-group">

             <div class="col-md-6" id="dynamic-div-video">

              <div class="form-group {{ $errors->has('event_video') ? 'has-error' : '' }}">

               <label>Video link of the Event</label>

               <input type="text" class="form-control video_name" name="event_video[]" id="event_video_1" placeholder="Enter video link of event">

               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('event_video') }}</span>

              </div>

            </div>

            <div class="col-md-6">

             <button class="btn btn-primary btn-sm add_div_event_video" title="Add more video link"><i class="fa fa-plus"></i></button>

             <button class="btn btn-danger btn-sm remove_div_event_video" style="visibility: hidden;" title="remove video link"><i class="fa fa-minus"></i></button>  

            </div>  

           </div>                

          </div>

        </div>

        <div class="box-footer">

         <button type="submit" class="btn btn-primary" id="admin_event_edit">Submit</button>

        </div>

      </form> 

    </div>

 </section>



 <section class="content">

  <div class="row">

   <div class="col-xs-12">

    <div class="box">

      <div class="box-header clearfix">

         <h3 class="box-title">All Event Contents</h3>

      </div>



       <div class="box-body">

        <div class="table-responsive"> 

         <table id="example1" class="table table-bordered table-striped">

          <thead>

            <tr>

             <th>SL No.</th>

             <th>Uploaded Content</th>

             <th>Created At</th>

             <th>Action</th>

            </tr>

           </thead>

            <tbody>

              @foreach($content_details as $key => $value)

              <tr>

              <td>{{++$key}}</td>

              <td>{{$value['content']}}</td>

              <td>{{Carbon\Carbon::parse($value['created_at'])->format('d-m-Y')}}</td>

              <td> <a title="Delete" href="{{ url('/') }}/admin/event_content/delete/{{$value['id']}}" onclick="return confirm('Do you really want to delete the current record ?');" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>

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