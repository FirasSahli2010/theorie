@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="{{ URL::route('language.store') }}" class="form-horizontal">
      @csrf
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="name" class="col-lg-2 control-label">Name</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}" />
          </div>
            <!-- Error -->
             @if ($errors->has('name'))
             <div class="error">
                 {{ $errors->first('name') }}
             </div>
             @endif
        </div>
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="locale" class="col-lg-2 control-label">Locale</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="locale" name="locale" class="form-control {{ $errors->has('locale') ? 'error' : '' }}" />
          </div>
            <!-- Error -->
               @if ($errors->has('locale'))
               <div class="error">
                   {{ $errors->first('locale') }}
               </div>
               @endif
        </div>
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="locale" class="col-lg-2 control-label">Code</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="code" name="code" class="form-control {{ $errors->has('code') ? 'error' : '' }}" />
          </div>
            <!-- Error -->
               @if ($errors->has('code'))
               <div class="error">
                   {{ $errors->first('code') }}
               </div>
               @endif
        </div>
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="translation" class="col-lg-2 control-label">Translation</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="translation" name="translation" class="form-control {{ $errors->has('translation') ? 'error' : '' }}" />
          </div>
            <!-- Error -->
               @if ($errors->has('translation'))
               <div class="error">
                   {{ $errors->first('translation') }}
               </div>
               @endif
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Y" id="chk_is_enabled" name="chk_is_enabled">
          <label class="form-check-label" for="chk_is_enabled">
            Enabled
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Y" id="chk_is_default" name="chk_is_default">
          <label class="form-check-label" for="chk_is_default">
            is default
          </label>
        </div>

        <div class="form-group">
            <div class=" d-flex justify-content-evenly input-group"
              <input class="btn btn-light" type="submit" value="Save">
              <input class="btn btn-light" type="reset" value="Reset">
              <a class="btn btn-light" href="{{ route('language.index') }}">Cancel</a>
            </div>
        </div>


      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
