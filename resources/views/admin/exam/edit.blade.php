@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST"  action="/admin/exams/{{ $examin->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="title" class="col-lg-2 control-label">Title</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="title" name="title" value="{{ $examin->title }}" class="form-control {{ $errors->has('title') ? 'error' : '' }}" />
            <p class="description">The name is how it appears on your site.</p>
          </div>
            <!-- Error -->
               @if ($errors->has('title'))
               <div class="error">
                   {{ $errors->first('title') }}
               </div>
               @endif
        </div>

        <!-- <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="desc" class="col-lg-2 control-label">Description</lable>
          </div>
          <div class="col-lg-10">
            <textarea name="desc" id="desc" rows="5" cols="50" class="form-control large-text" placeholder="Add desctiption" >{{ $examin->desc }}</textarea>
            <p class="description">The description is not prominent by default, it will not be shown.</p>
          </div>
        </div> -->


        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="lang" class="col-lg-2 control-label">Langauge</label>
          </div>
            <div class="col-lg-10">
          <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
              @<?php foreach ($langArray as $lang): ?>
                <option value="{{ $lang->code }}"
                  @if ($lang->code == $examin->language )
                    Selected
                  @endif
                  >
                  {{ $lang->name }}
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">
              <input class="btn btn-light" type="submit" name="save" id="save" value="Save">

              @if ($examin->shw == 'Y')
                <input class="btn btn-light" type="submit" name="draft" id="draft" value="Draft">
              @else
                <input class="btn btn-light" type="submit" name="publish" id="publish" value="Publish">
              @endif
              <input class="btn btn-light" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('exams.index') }}">Cancel</a>
            </div>
        </div>

      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
