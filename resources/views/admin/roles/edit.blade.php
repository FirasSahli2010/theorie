@extends('layouts.admin.app')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<div class="well">
  <!-- if there are creation errors, they will show here -->
  <form method="POST" action="/admin/roles/{{$role->id}}" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <fieldset >
      <div style="width: 90%;" class="row">
        <div class="mb-3">
          <label for="summ" class="control-label">Name</label>
          <input type="text" placeholder="Role name" value="{{$role->name}}" id="name" name="name" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
        </div>
        <div class="mb-3">
          <label for="summ" class="control-label">Name</label>
          <select style="width:200px; height: 30px; " multiple class="custom-select" name="permission[]" id="permission" multi>
            @foreach ($permission as $value): ?>
              <option value="{{ $value->id }}" <?=(in_array($value->id, $rolePermissions))?' SELECTED ':''?>>
                {{ $value->name }}
              </option>
            @endforeach;
          </select>
        </div>
      </fieldset>

      <div style="text-align:center;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
        <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
        <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
        <input class="btn btn-primary" type="reset" value="Reset">
        <a class="btn btn-primary" href="/admin/roles/">Cancel</a>
      </div>
    </form>
  <!-- </div>
</div> -->
</div>

@endsection
