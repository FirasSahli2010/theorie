@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/admin/menu/{{ $menu->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
         <fieldset class="uk-fieldset">
          <!-- <div class="laraberg-sidebar"> -->
          <div class="col-lg-12">
            <div class="form-group">
              <div >
                <div class="control-label">
                  <label for="title" class="control-label">Title</label>
                </div>
                <input type="text" placeholder="Title" id="title" name="title" value="{{ $menu->title }}" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
              </div>

            </div>
            <div class="form-group">
              <div >
                <div class="control-label">
                  <label for="name" class="control-label">name</label>
                </div>
                <input type="text" placeholder="Name" id="name" name="name" value="{{ $menu->name }}" class=" form-control {{ $errors->has('name') ? 'error' : '' }}" />
              </div>

            </div>

            <div class="form-group">
              <div class="control-label">
                <label for="parent_category" class="col-lg-2 control-label">Category</label>
              </div>
              <select style="width:200px; height: 30px; " class="custom-select" name="parent_category" id="parent_category">
                @foreach ($data as $item): ?>
                  <option value="{{ $item->id }}"
                    @if ( $menu->categlory == $item->id  )
                      SELECTED
                    @endif
                    >
                    {{ $item->title }}
                  </option>
                @endforeach;
              </select>

            </div>
            <div class="form-group">
              <div class="control-label">
                <label for="position" class="control-label">Position</label>
              </div>
              <select style="width:200px; height: 30px; " class="custom-select" name="position" id="position">
                @php
                $positionList = Config::get('position.position')
                @endphp
                @foreach ($positionList as $position_key=>$position_name)
                  <option value="{{ $position_key }}"
                  @if ($menu->possition == $position_key )
                    SELECTED
                  @endif
                  >
                    {{ $position_name }}
                  </option>
                @endforeach;

              </select>
            </div>
            <div class="form-group">
              <div class="control-label">
                <label for="lang" class="control-label">Language</label>
              </div>
              <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
                @foreach ($langArray as $lang): ?>
                  <option value="{{ $lang->id }}"
                  @if ($menu->language == $lang->id )
                    SELECTED
                  @endif
                  >
                    {{ $lang->name}}
                  </option>
                @endforeach;
              </select>
            </div>
          </div>

          <!-- <div class="uk-margin">

          </div> -->
        <!-- </div> -->

        </fieldset>

        <div style="text-align: center;" class="form-group">
              <div style="text-align: center;">
                <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
                <input class="btn btn-primary" type="reset" value="Reset">
                <a class="btn btn-primary" href="{{ route('menu.index') }}">Cancel</a>
              </div>
            </div>
      </form>
    <!-- </div>
  </div> -->
</div>
<script type="text/javascript">
      window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('desc', { height: '600px', laravelFileadminr: true, sidebar: true })
    })
</script>


@endsection
<!--  -->
