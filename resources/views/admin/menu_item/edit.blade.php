@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/manage/menu/{{$menu->id}}/item/{{$menu_item->id}}" class="form-horizontal">
        @method('PUT')
        @csrf
        <!-- <div class="laraberg-sidebar"> -->
     <!--  <div class="col-lg-4"> -->
            <div class="form-group">
              <div >
                <div style="text-align: left;" class="control-label">
                  <label  for="title" class="control-label">Title</label>
                </div>
                <input type="text" placeholder="Title" id="title" name="title" value="{{ $menu_item->title }}" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
              </div>

            </div>
            <div class="form-group">
              <div >
                <div style="text-align: left;" class="control-label">
                  <label for="link" class="control-label">link</label>
                </div>
                <input type="text" placeholder="Lnik" id="link" name="link" value="{{ $menu_item->link }}" class=" form-control {{ $errors->has('link') ? 'error' : '' }}" />
              </div>

            </div>

            <input type="hidden" name="menu" id="menu" value="{{$menu->id}}" />

        <div class="form-group">
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
        Laraberg.init('desc', { height: '600px', laravelFilemanager: true, sidebar: true })
    })
</script>


@endsection
<!--  -->
