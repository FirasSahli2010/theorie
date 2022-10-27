@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/manage/block" class="form-horizontal">
        @csrf
         <fieldset class="uk-fieldset">
          <!-- <div class="laraberg-sidebar"> -->
     <!--  <div class="col-lg-4"> -->
        <div class="col-xl-4 col-md-4 col-sm-12">
          <div class="form-group">
            <div >
              <div class="control-label">
                <label for="title" class="col-lg-2 control-label">Title</label>
              </div>
              <input type="text" placeholder="Title" id="title" name="title" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
            </div>
          </div>

          <div class="form-group">
            <div >
              <div class="control-label">
                <label for="name" class="col-lg-2 control-label">name</label>
              </div>
              <input type="text" placeholder="Name" id="name" name="name" class=" form-control {{ $errors->has('name') ? 'error' : '' }}" />
            </div>
          </div>

          <div class="form-group">
            <div class="control-label">
              <label for="order" class="col-lg-2 control-label">Order</label>
            </div>
            <input type="number" placeholder="Order" id="order" name="order" class=" form-control " />
          </div>

        </div>

        <div style="text-align: center;" class="col-xl-8 col-md-8 col-sm-12">
          <div class="form-group">
            <div style="text-align: center;" class="control-label">
              <label for="lang" class="control-label">Language</label>
            </div>
            <select style="width:200px; height: 30px; " class="custom-select" name="language" id="language">
              <option value="0">
                Any
              </option>
              @foreach ($langArray as $lang): ?>
                <option value="{{ $lang->id }}">
                  {{ $lang->name}}
                </option>
              @endforeach;
            </select>
          </div>
          <div class="form-group">
            <div style="text-align: center;" class="control-label">
              <label for="category" class="control-label">Category</label>
            </div>
            <select style="width:200px; height: 30px; " class="custom-select" name="category" id="category">
              <option value="0">
                Any
              </option>
              @foreach ($category_data as $category): ?>
                <option value="{{ $category->id }}">
                  {{ $category->title }}
                </option>
              @endforeach;
            </select>
          </div>

          <div class="form-group">
            <div style="text-align: center;" class="control-label">
              <label for="page" class="control-label">Page</label>
            </div>
            <select style="width:200px; height: 30px; " class="custom-select" name="page" id="page">
              <option value="0">
                Any
              </option>
              @foreach ($page_data as $page): ?>
                <option value="{{ $page->id }}">
                  {{ $page->title }}
                </option>
              @endforeach;
            </select>
          </div>

          <div class="form-group">
            <div style="text-align: center;" class="control-label">
              <label for="post" class="control-label">Post</label>
            </div>
            <select style="width:200px; height: 30px; " class="custom-select" name="post" id="post">
              <option value="0">
                Any
              </option>
              @foreach ($post_data as $post): ?>
                <option value="{{ $post->id }}">
                  {{ $post->title }}
                </option>
              @endforeach;
            </select>
          </div>

          <div class="form-group">
            <div style="text-align: center;" class="control-label">
              <label for="position" class="control-label">Position</label>
            </div>
            <select style="width:200px; height: 30px; " class="custom-select" name="position" id="position">
              @php
              $positionList = Config::get('position.position')
              @endphp
              <option value="0">
                Any
              </option>
              @foreach ($positionList as $position_key=>$position_name)
                <option value="{{ $position_key }}">
                  {{ $position_name }}
                </option>
              @endforeach;

            </select>
          </div>
        </div>
        <div style="text-align: center;" class="col-xl-12 col-md-12 col-sm-12">
          @foreach ($template_date as $template)
          <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="template" id="template_{{ $template->id }}" value="{{ $template->id }}">
              <label class="form-check-label" for="template">
                {{ $template->title }}
              </label>
            </div>
          </div>
          @endforeach
        </div>



          <!-- </div> -->
          <!-- <div class="uk-margin">

          </div> -->
        <!-- </div> -->

        </fieldset>


        <div class="form-group">
              <div style="text-align: center;">
                <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
                <input class="btn btn-primary" type="reset" value="Reset">
                <a class="btn btn-primary" href="{{ route('block.index') }}">Cancel</a>
              </div>
            </div>
      </form>
    <!-- </div>
  </div> -->
</div>
<script type="text/javascript">
      window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('desc', { height: '600px', laravelFilemanager: true, sidebar: true })
    })
</script>


@endsection
<!--  -->
