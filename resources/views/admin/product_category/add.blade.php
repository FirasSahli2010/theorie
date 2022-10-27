@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">-->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h2 class="panel-title">{{ __('Add a product category') }}</h2>
        </div>
      </div>
    </div>
    <div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/manage/product_category" class="form-horizontal">
      @csrf
      <div style="width: 90%;" class="row">
      <div class="col-12 col-xl-8 col-lg-8 col-md-8">
        <div class="mb-3">
            <label for="desc" class="control-label"> Description </lable>
            <textarea name="desc" id="desc"  rows="20" cols="80" class="form-control"  ></textarea>
        </div>
      </div>
      <div class="col-12 col-xl-2 col-lg-2 col-md-2 py-3">

        <div class="mb-3">

            <label for="title" class="control-label">Title</lable>
            <input type="text" id="title" name="title" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" style="width: 250px;" />
            <!-- Error -->
               @if ($errors->has('title'))
               <div class="error">
                   {{ $errors->first('title') }}
               </div>
               @endif
          </div>
        <div class="mb-3">

            <label for="parent_category" class="col-lg-2 control-label">Filter</label>

              <select name="parent_category" id="parent_category" style="width:250px; height: 30px; " class="custom-select" name="filter" id="filter">
                <option value="0"> ----- </option>
              @<?php foreach ($filters as $filter): ?>
                <option value="{{ $filter->id }}">{{ $filter->title }}</option>
              <?php endforeach; ?>
            </select>

        </div>
        {{-- <div class="mb-3">

            <label for="parent_category" class="control-label">Parent category</label>
            <select style="width:250px; height: 30px; " class="custom-select" name="parent_category" id="parent_category">
              <option value="0"> ----- </option>
              <?php foreach ($data as $item): ?>
                <option value="{{ $item->id }}">{{ $item->title }}</option>
              <?php endforeach; ?>
            </select>
        </div> --}}

        <div class="mb-3">

            <label for="lang" class="col-lg-2 control-label">Langauge</label>

          <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
              @<?php foreach ($langArray as $lang): ?>
                <option value="{{ $lang->id }}">
                  {{ $lang->name }}
                </option>
              <?php endforeach; ?>
            </select>

        </div>
      </div>

        <div class="form-group py-3">
            <div class="col-lg-12">
              <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
              <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('product_category.index') }}">Cancel</a>
            </div>
        </div>
</div>

      </form>
    <!-- </div>
  </div> -->
</div>
<script  type="text/javascript">
$('#filter').change(function() {

  if ($("#filter").val()!=0 ) {
    $("#parent_category").val(0);
    $("#parent_category").attr('disabled', true);
  }
  else {
    $("#parent_category").val(0);
    $("#parent_category").attr('disabled', false);
  }

});

$('#parent_category').change(function() {

   if ($("#parent_category").val()!=0 ) {
    $("#filter").val(0);
    $("#filter").attr('disabled', true);
  }
  else {
    $("#filter").val(0);
    $("#filter").attr('disabled', false);
  }

});
</script>
@endsection
<!--  -->
