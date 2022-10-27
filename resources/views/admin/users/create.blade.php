@extends('layouts.admin.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/user/"> Back</a>
        </div>
    </div>
</div>


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



<form method="POST" action="/admin/user" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <fieldset >
          <div style="width: 90%;" class="row">

  <div class="mb-3">
    <label for="name" class="control-label">Name</label>
    <input type="text" placeholder="User name" id="name" name="name" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
  </div>
  <div class="mb-3">
    <label for="email" class="control-label">Email</label>
    <input type="email" id="email" name="email" class=" form-control " />
  </div>
    <div class="mb-3">
      <label for="password" class="control-label">Password</label>
      <input type="password" id="password" name="password" class=" form-control" />
    </div>
    <div class="mb-3">
      <label for="password" class="control-label">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" class=" form-control" />
    </div>
    <div class="mb-3">
      <label for="password" class="control-label">Confirm Password</label>
      <select style="width:200px; height: 30px; " multiple class="custom-select" name="roles[]" id="roles" multi>
        @foreach ($roles as $role): ?>
          <option value="{{ $role->id }}">
            {{ $role->name }}
          </option>
        @endforeach;
      </select>
    </div>

  </div>
</fieldset>

  <div style="text-align:center;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
    <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
    <input class="btn btn-primary" type="reset" value="Reset">
    <a class="btn btn-primary" href="/admin/user">Cancel</a>
  </div>
</form>

@endsection
