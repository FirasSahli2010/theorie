@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                      <h3 class="panel-title">{{ __('Contact Details') }}</h3>
                  </div>
              </div>
          </div>

        <div class="table-responsive" >
        <!-- <table class="table table-striped table-sm"> -->
          <div class="table table-striped table-hover table-sm table table-bordered" >


            @if ($contact)
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Job title</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->job_title }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Full name</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->full_name }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Telephone</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->telephone }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Mobile</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->mobile }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Email</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->email }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Country</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->country }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">City</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->city }}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Address</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12"> &nbsp; {{$contact->address}}</div>
              </div>
              <div role="row">
                <div style="padding: 5px 5px 5px 5px" class="col-lg-3 col-md-3 col-sm-12">Last update</div>
                <div style="padding: 5px 5px 5px 5px" class="col-lg-9 col-md-9 col-sm-12">&nbsp; {{ $contact->updated_at }}</div>
              </div>

            @endif
            <div>
              <div style="text-align: center;">
                <a class="btn btn-primary" href="/manage/contact/{{$contact->id}}/edit/">Edit</a>
                <a class="btn btn-xs btn-danger delete" href="/manage/contact/{{$contact->id}}/delete/">Delete</a>
                <a class="btn btn-primary" href="{{ route('contact.index') }}">Back</a>
              </div>
            </div>

        </div>
      </div>
    </div>



</div>
@endsection
