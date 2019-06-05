@extends('admin.layout.dashboard_layout')
@section('content')
    <section class="content-header">
      <h1>
        ELTA
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/admin/elta">ELTA</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Letter</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <form method="POST" action="/elta/edit_submit/{{ $elta_details['id'] }}" name="elta_add_form" id="elta_add_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('elta_letter') ? 'has-error' : '' }}">
                            <label>Letter</label>
                            <select class="form-control select2" style="width: 100%;" name="elta_letter" id="elta_letter">
                                <option value="e" {{ ( $elta_details['elta_letter'] == 'e' ) ? 'selected' : '' }}>E</option>
                                <option value="l" {{ ( $elta_details['elta_letter'] == 'l' ) ? 'selected' : '' }}>L</option>
                                <option value="t" {{ ( $elta_details['elta_letter'] == 't' ) ? 'selected' : '' }}>T</option>
                                <option value="a" {{ ( $elta_details['elta_letter'] == 'a' ) ? 'selected' : '' }}>A</option>
                            </select>
                            @if ($errors->first('elta_letter'))<span class="input-group" style="color: red;">{{ $errors->first('elta_letter') }}</span>@endif
                        </div>
                        <div class="form-group {{ $errors->has('elta_symbol') ? 'has-error' : '' }}">
                            <label>Symbol</label>
                            <input type="text" class="form-control" name="elta_symbol" id="elta_symbol" placeholder="Enter symbol" value="{{ $elta_details['elta_symbol'] }}">
                            @if ($errors->first('elta_symbol'))<span class="input-group" style="color: red;">{{ $errors->first('elta_symbol') }}</span>@endif
                        </div>
                        <!-- <div class="form-group">
                            <label>Word Details</label>
                            <input type="text" class="form-control {{ $errors->has('elta_word_details') ? 'has-error' : '' }}" name="elta_word_details" id="elta_word_details" placeholder="Enter word details">
                            @if ($errors->first('elta_word_details'))<span class="input-group text-danger">{{ $errors->first('elta_word_details') }}</span>@endif
                        </div> -->
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('elta_synonyms') ? 'has-error' : '' }}">
                          <label>Synonyms</label>
                          <input type="text" class="form-control" name="elta_synonyms" id="elta_synonyms" placeholder="Enter synonyms" value="{{ $elta_details['elta_synonyms'] }}">
                          @if ($errors->first('elta_synonyms'))<span class="input-group" style="color: red;">{{ $errors->first('elta_synonyms') }}</span>@endif
                      </div>


                    </div>
                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <div class="col-md-6">
                      <div class="form-group {{ $errors->has('elta_word') ? 'has-error' : '' }}">
                          <label>Word</label>
                          <input type="text" class="form-control" name="elta_word" id="elta_word" placeholder="Enter word" value="{{ $elta_details['elta_word'] }}">
                          @if ($errors->first('elta_word'))<span class="input-group" style="color: red;">{{ $errors->first('elta_word') }}</span>@endif
                      </div>
                      <div class="form-group {{ $errors->has('elta_parts_of_speech') ? 'has-error' : '' }}">
                          <label>Parts Of Speech</label>
                          <input type="text" class="form-control" name="elta_parts_of_speech" id="elta_parts_of_speech" placeholder="Enter parts of speech" value="{{ $elta_details['elta_parts_of_speech'] }}">
                          @if ($errors->first('elta_parts_of_speech'))<span class="input-group" style="color: red;">{{ $errors->first('elta_parts_of_speech') }}</span>@endif
                      </div>

                    </div>
                    <!-- /.col -->

                    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('description_1') ? 'has-error' : '' }}">
                            <label>Description 1</label>
                            <textarea class="form-control" name="description_1" id="description_1" rows="8" placeholder="Enter description"> {{ $elta_details['description_1'] }}</textarea>
                            @if ($errors->first('description_1'))<span class="input-group" style="color: red;">{{ $errors->first('description_1') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group {{ $errors->has('description_2') ? 'has-error' : '' }}">
                            <label>Description 2</label>
                            <textarea class="form-control" name="description_2" id="description_2" rows="8" placeholder="Enter description">{{ $elta_details['description_2'] }}</textarea>
                            @if ($errors->first('description_2'))<span class="input-group" style="color: red;">{{ $errors->first('description_2') }}</span>@endif
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="elta_add_submit">Update Record</button>
                        </div>
                    </div>
                </form>
            </div>
          <!-- /.row -->
        </div>
      <!-- /.box-body -->

      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
    @endsection
