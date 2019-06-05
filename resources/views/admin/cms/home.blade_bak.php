@extends('admin.layout.dashboard_layout')
@section('content')

         <section class="content-header">
           <h1>
             Home Settings
            </h1>
             <ol class="breadcrumb">
              <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="/admin/cms/home">ELTA</a></li>
             </ol>
           </section>

          <section class="content">
           <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">ELTA</h3>
          </div>

            <form method="POST" action="/admin/home_content_submit" name="home_content_form" id="home_content_form" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="box-body">
            @if(Session::has('submit-status'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    {{ Session::get('submit-status') }}
                </div>
            @endif
           <div class="row">
             <div class="col-md-6">
              <div class="form-group {{ $errors->has('box_one_title') ? 'has-error' : '' }}">
               <label>Box One Title</label>
               <input type="text" class="form-control" name="box_one_title" placeholder="Enter title for box one" value='{{$home['box_one_title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_one_title') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_one_desc') ? 'has-error' : '' }}">
              <label>Box One Description</label>
              <textarea class="form-control" name="box_one_desc" placeholder="Enter description for box one">{{$home['box_one_desc']}}</textarea>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_one_desc') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_one_icon') ? 'has-error' : '' }}">
              <label>Box One Icon</label>
              <?php if ($home['box_one_icon']) {?>
              <br><img src="{{ url('upload/cms/home/resize/'.$home['box_one_icon'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
              <input type="file" name="box_one_icon">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_one_icon') }}</span>
              </div><br>
              <div class="form-group {{ $errors->has('box_two_title') ? 'has-error' : '' }}">
               <label>Box Two Title</label>
               <input type="text" class="form-control" name="box_two_title" placeholder="Enter title for box two" value='{{$home['box_two_title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_two_title') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_two_desc') ? 'has-error' : '' }}">
              <label>Box Two Description</label>
              <textarea class="form-control" name="box_two_desc" placeholder="Enter description for box two">{{$home['box_two_desc']}}</textarea>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_two_desc') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_two_icon') ? 'has-error' : '' }}">
              <label>Box Two Icon</label>
              <?php if ($home['box_two_icon']) {?>
              <br><img src="{{ url('upload/cms/home/resize/'.$home['box_two_icon'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
              <input type="file" name="box_two_icon">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_two_icon') }}</span>
              </div><br>
              <div class="form-group {{ $errors->has('middle_section_title') ? 'has-error' : '' }}">
               <label>Middle Section Title</label>
               <input type="text" class="form-control" name="middle_section_title" placeholder="Enter title for middle section" value='{{$home['middle_section_title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('middle_section_title') }}</span><br>
             </div>
            </div>
            <div class="col-md-6">
             <div class="form-group {{ $errors->has('box_three_title') ? 'has-error' : '' }}">
               <label>Box Three Title</label>
               <input type="text" class="form-control" name="box_three_title" placeholder="Enter title for box three" value='{{$home['box_three_title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_three_title') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_three_desc') ? 'has-error' : '' }}">
              <label>Box Three Description</label>
              <textarea class="form-control" name="box_three_desc" placeholder="Enter description for box three">{{$home['box_three_desc']}}</textarea>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_three_desc') }}</span>
              </div>
              <div class="form-group {{ $errors->has('box_three_icon') ? 'has-error' : '' }}">
              <label>Box Three Icon</label>
              <?php if ($home['box_three_icon']) {?>
              <br><img src="{{ url('upload/cms/home/resize/'.$home['box_three_icon'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
              <input type="file" name="box_three_icon">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('box_three_icon') }}</span>
              </div><br>
             <div class="form-group {{ $errors->has('video_title') ? 'has-error' : '' }}">
               <label>Video Title</label>
               <input type="text" class="form-control" name="video_title" placeholder="Enter title for video" value='{{$home['video_title']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('video_title') }}</span>
             </div>
              <div class="form-group {{ $errors->has('video_text') ? 'has-error' : '' }}">
              <label>Video Text</label>
              <textarea class="form-control" name="video_text" placeholder="Enter text for video">{{$home['video_text']}}</textarea>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('video_text') }}</span>
              </div>
              <div class="form-group {{ $errors->has('video_link') ? 'has-error' : '' }}">
               <label>Video Link</label>
               <input type="text" class="form-control" name="video_link" placeholder="Enter link for video" value='{{$home['video_link']}}'>
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('video_link') }}</span>
             </div>
             <div class="form-group {{ $errors->has('middle_section_image') ? 'has-error' : '' }}">
              <label>Middle Section Image</label>
              <?php if ($home['middle_section_image']) {?>
              <br><img src="{{ url('upload/cms/home/resize/'.$home['middle_section_image'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
              <input type="file" name="middle_section_image">
              <span class="input-group col-md-4" style="color: red;">{{ $errors->first('middle_section_image') }}</span>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group {{ $errors->has('middle_section_content') ? 'has-error' : '' }}">
               <label>Home middle section content</label>
                <textarea class="form-control" rows="10" name="middle_section_content" id="middle_section_content" placeholder="Enter description for middle section">{{$home['middle_section_content']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('middle_section_content') }}</span><br>
             </div>
            </div><br>

             <div class="col-md-12">
              <div class="form-group {{ $errors->has('company_desc') ? 'has-error' : '' }}">
               <label>About Company</label>
                <textarea class="form-control" rows="10" name="company_desc" id="company_desc" placeholder="Enter description for company">{{$home['company_desc']}}</textarea>
                <span class="input-group col-md-4" style="color: red;">{{ $errors->first('company_desc') }}</span>
               </div><br>
              <div class="form-group {{ $errors->has('company_image') ? 'has-error' : '' }}">
               <label>Company Image</label>
               <?php if ($home['company_image']) {?>
               <br><img src="{{ url('upload/cms/home/resize/'.$home['company_image'])}}" style="width: 75px;height: 75px;" class="img-thumbnail"><br><br><?php }?>
               <input type="file" name="company_image">
               <span class="input-group col-md-4" style="color: red;">{{ $errors->first('company_image') }}</span>
              </div>
             </div>
          </div>
        </div>
        <div class="box-footer">
         <button type="submit" class="btn btn-primary" id="home_content_submit">Submit</button>
        </div>
      </form>
      </div>
   </section>

@endsection