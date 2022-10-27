@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">-->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h2 class="panel-title">{{ __('Edit a product category') }}</h2>
        </div>
      </div>
    </div>
    <div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST"  action="/admin/product_category/{{ $category->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <div style="width: 90%;" class="row">
          <div class="col-12 col-xl-8 col-lg-8 col-md-8">
            <div class="mb-3">
              <label for="desc" class="control-label">Description</lable>
              <textarea name="desc" id="desc" rows="10" cols="80"  class="form-control " >{{ $category->desc }}</textarea>
            </div>
          </div>
          <div class="col-12 col-xl-2 col-lg-2 col-md-2 py-3">
            <div class="mb-3">
              <label for="title" class="col-lg-2 control-label">Title</lable>
              <input type="text" id="title" name="title" value="{{ $category->title }}" class="form-control {{ $errors->has('title') ? 'error' : '' }}" style="width: 250px;" />
            </div>
            <!-- Error -->
               @if ($errors->has('title'))
               <div class="error">
                   {{ $errors->first('title') }}
               </div>
               @endif
            <div class="mb-3">
              <label for="parent_category" class=" control-label">Parent</label>
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
            </div>
            <div class="mb-3">
              <label for="lang" class="col-lg-2 control-label">Langauge</label>
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
        </div>
        <div class="form-group py-3">
            <div class="col-lg-12">
              <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">

              @if ($category->shw == 'Y')
                <input class="btn btn-primary" type="submit" name="draft" id="draft" value="Draft">
              @else
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              @endif
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('product_category.index') }}">Cancel</a>
            </div>
        </div>

      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
