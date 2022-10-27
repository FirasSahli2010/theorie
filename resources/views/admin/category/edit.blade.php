@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST"  action="/admin/category/{{ $category->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="title" class="col-lg-2 control-label">Title</lable>
          </div>
          <div class="col-lg-10">
            <input type="text" id="title" name="title" value="{{ $category->title }}" class="form-control {{ $errors->has('title') ? 'error' : '' }}" />
            <p class="description">The name is how it appears on your site.</p>
          </div>
            <!-- Error -->
               @if ($errors->has('title'))
               <div class="error">
                   {{ $errors->first('title') }}
               </div>
               @endif
        </div>

        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="desc" class="col-lg-2 control-label">Description</lable>
          </div>
          <div class="col-lg-10">
            <textarea name="desc" id="desc" rows="5" cols="50" class="form-control large-text" placeholder="Add desctiption" >{{ $category->desc }}</textarea>
            <p class="description">The description is not prominent by default, it will not be shown.</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="parent_category" class="col-lg-2 control-label">Parent</label>
          </div>
            <div class="col-lg-10">
          <select style="width:200px; height: 30px; " name="parent_category" id="parent_category">
              @<?php foreach ($data as $item): ?>
                <option value="{{ $item->id }}"
                  @if ($item->id == $category->parent_category)
                    selected
                  @endif
                  >
                  {{ $item->title }}
                </option>
              <?php endforeach; ?>
            </select>
            <p class="description">Categories can have a hierarchy. You might have a parent category, and under that have children categories. Totally optional</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-2 control-label">
            <label for="lang" class="col-lg-2 control-label">Langauge</label>
          </div>
            <div class="col-lg-10">
          <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
              @<?php foreach ($langArray as $lang): ?>
                <option value="{{ $lang->id }}"
                  @if ($lang->id == $category->language )
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
              <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">

              @if ($category->shw == 'Y')
                <input class="btn btn-primary" type="submit" name="draft" id="draft" value="Draft">
              @else
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              @endif
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('category.index') }}">Cancel</a>
            </div>
        </div>

      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
