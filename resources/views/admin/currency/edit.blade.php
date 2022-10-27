@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/manage/currency/{{ $currency->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="form-group">
          <div class="col-lg-2 control-label" style="margin: 5px 0 5px 0;">
            <label for="price" class="col-lg-2 control-label">Price</lable>
          </div>
          <div class="col-lg-10 d-flex flex-nowrap" style="margin: 5px 0 5px 0;">
            <input style="width: 200px;" type="text" value="{{ $currency->price }}" id="price" name="price" class="form-control {{ $errors->has('name') ? 'error' : '' }}" /> = 1 USD
          </div>

        </div>



        <div class="form-group">
            <div class="col-lg-12">
              <input class="btn btn-primary" type="submit" value="Save">
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="/manage/currency/">Cancel</a>
            </div>
        </div>


      </form>
    <!-- </div>
  </div> -->
</div>
@endsection
<!--  -->
