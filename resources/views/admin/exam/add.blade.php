@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/admin/exams" class="form-horizontal">
      @csrf
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="title" class="col-lg-2 control-label">Title</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="title" name="title" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
            <p class="description">The name is how it appears on your site.</p>
          </div>
            <!-- Error -->
               @if ($errors->has('title'))
               <div class="error">
                   {{ $errors->first('title') }}
               </div>
               @endif
        </div>

        <div class="col-lg-2 control-label">
          <label for="title" class="col-lg-2 control-label">examination number</lable>
        </div>
        <div class="col-lg-10">
          <input type="text" id="num" name="num" class=" form-control {{ $errors->has('num') ? 'error' : '' }}" />
          <p class="description">The order of this examination is how it appears on your site.</p>
        </div>
          <!-- Error -->
             @if ($errors->has('num'))
             <div class="error">
                 {{ $errors->first('num') }}
             </div>
             @endif
      </div>

        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="parent_category" class="col-lg-2 control-label">Langauge</label>
          </div>
            <div class="col-lg-10">
          <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
              @<?php foreach ($langArray as $lang): ?>
                <option value="{{ $lang->code }}">
                  {{ $lang->name }}
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">
              <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">
              <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('exams.index') }}">Cancel</a>
            </div>
        </div>


      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
