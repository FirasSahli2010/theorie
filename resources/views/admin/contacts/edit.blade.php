@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/admin/contact/{{ $contact->id }}" class="form-floating">
        @csrf
        @method('PUT')
         <fieldset class="uk-fieldset">
          <!-- <div class="laraberg-sidebar"> -->
     <!--  <div class="col-lg-4"> -->
          <div class="row g-2">
            <div class="col-md form-group">
              <div class="form-floating ">
                <input type="text" value="{{ $contact->job_title }}" placeholder="job_title" id="job_title" name="job_title" class=" form-control " />
                <label for="job_title" class="control-label">Job title</label>
              </div>
            </div>
            <div class="col-md form-group">
              <div class="form-floating">
                <input type="text" value="{{ $contact->full_name }}" placeholder="full_name" id="full_name" name="full_name" class=" form-control {{ $errors->has('full_name') ? 'error' : '' }}" />
                <label for="name" class="control-label">name</label>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="form-floating">
                <input type="email" value="{{ $contact->email }}" placeholder="name@example.com" id="email" name="email" class=" form-control" />
                <label for="email" class="control-label">email</label>
              </div>
            </div>
            <div class="col-md form-group">
              <div class="form-floating">
                <select class="form-select" name="lang" id="lang" aria-label="Floating label select example">
                  <option value="0">
                    Any
                  </option>
                  @foreach ($langArray as $lang): ?>
                    <option value="{{ $lang->id }}" <?PHP echo ($contact->language == $lang->id)?' SELECTED ':''; ?> >
                      {{ $lang->name}}
                    </option>
                  @endforeach;
                </select>
                <label for="lang" class="control-label">Language</label>
              </div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-md form-group">
              <div class="form-floating" >
                  <input type="tel" value="{{ $contact->telephone }}" placeholder="telephone" id="telephone" name="telephone" class=" form-control " />
                  <label for="telephone" class="control-label">Telephone</label>
                </div>
              </div>
              <div class="col-md form-group">
                <div class="form-floating">
                  <input type="tel" value="{{ $contact->mobile }}" placeholder="Mobile" id="mobile" name="mobile" class=" form-control " />
                  <label for="mobile" class="control-label">mobile</label>
                </div>
              </div>
            </div>
          <div class="row g-2">
            <div class="col-md form-group">
              <div class="form-floating" >
                <input type="text" value="{{ $contact->country }}" placeholder="Country" id="country" name="country" class=" form-control" />
                <label for="telephone" class="control-label">Country</label>
            </div>
          </div>
          <div class="col-md form-group">
            <div class="form-floating">
                <input type="text" value="{{ $contact->city }}" placeholder="City" id="city" name="city" class=" form-control" />
                <label for="country" class="control-label">City</label>
              </div>
            </div>
            <div class="col-md form-group">
              <div class="form-floating">
                <input type="text" value="{{ $contact->address }}" placeholder="Address" id="address" name="address" class=" form-control" />
              <label for="country" class="control-label">Address</label>
            </div>
          </div>
        </div>

          <!-- </div> -->
          <!-- <div class="uk-margin">

          </div> -->
        <!-- </div> -->

        </fieldset>

        <div class="form-group">
              <div class=" d-flex justify-content-evenly input-group">
                <input class="btn btn-light" type="submit" name="save" id="save" value="Save">
                <input class="btn btn-light" type="reset" value="Reset">
                <a class="btn btn-light" href="{{ route('contact.index') }}">Cancel</a>
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
