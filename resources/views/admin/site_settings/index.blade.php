@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{ __('Site Settings & identity') }}</h3>
          </div>
        </div>
      </div>

        @if( session()->has( 'message' ))
          <div class="col-md-12">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
          </div>
        @endif

        <div class="col-md-12">
          <div class="accordion accordion-flush" id="accordionFlushExample">

            @foreach ($site_language_settings as $setting_items)
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading_{{$setting_items->id}}">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{$setting_items->id}}" aria-expanded="false"
                   aria-controls="flush-collapse_{{$setting_items->id}}">
                    {{ (\App\Http\Controllers\LanguagesController::get_language_name($setting_items->language)) }}
                  </button>
                </h2>
                <div id="flush-collapse_{{$setting_items->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading_{{$setting_items->id}}" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <form method="POST"  action="/admin/site_settings/update/{{ $setting_items->id }}" class="form-horizontal" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <div style="text-align: left;" class="col-lg-12 control-label">
                          <label for="site_title_{{ $setting_items->id }}" class="col-lg-2 control-label">Site Title</lable>
                        </div>
                        <div style="text-align: left;" class="col-lg-12">
                          <input type="text" id="site_title_{{ $setting_items->id }}" name="site_title_{{ $setting_items->id }}" value="{{ $setting_items->site_title }}" class="form-control" />
                          <p class="description">The title of the website.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div style="text-align: left;" class="col-lg-12 control-label">
                          <label for="site_name_{{ $setting_items->id }}" class="col-lg-2 control-label">site name</lable>
                        </div>
                        <div style="text-align: left;" class="col-lg-12">
                          <input style="width: 50%;" type="text" id="site_name_{{ $setting_items->id }}" name="site_name_{{ $setting_items->id }}" value="{{ $setting_items->site_name }}" class="form-control" />
                          <p class="description">The name of the website, this will appear on the header.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div style="text-align: left;" class="col-lg-12 control-label">
                          <label for="site_meta_desc_{{ $setting_items->id }}" class="col-lg-2 control-label">site meta description</lable>
                        </div>
                        <div style="text-align: left;" class="col-lg-12">
                          <input style="width: 50%;" type="text" id="site_meta_desc_{{ $setting_items->id }}" name="site_meta_desc_{{ $setting_items->id }}" value="{{ $setting_items->site_meta_desc }}" class="form-control" />
                          <p class="description">A short description of the website, this will help linking to search engines.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div style="text-align: left;" class="col-lg-12 control-label">
                          <label for="site_meta_keywords_{{ $setting_items->id }}" class="col-lg-2 control-label">keywords</lable>
                        </div>
                        <div style="text-align: left;" class="col-lg-12">
                          <input style="width: 50%;" type="text" id="site_meta_keywords_{{ $setting_items->id }}" name="site_meta_keywords_{{ $setting_items->id }}" value="{{ $setting_items->site_meta_keywords }}" class="form-control" />
                          <p class="description">A list of keywords that descripe the website, this will help linking to search engines.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="col-md-6">
                               <input type="file" name="image_{{ $setting_items->id }}" id="image_{{ $setting_items->id }}" class="form-control">
                           </div>
                           <img src="{{ URL::to('/') }}/images/{{ $setting_items->site_logo }}" id="thumbnail_{{ $setting_items->id }}" style="width: 50%" type="text" name="filepath_{{ $setting_items->id }}">
                        </div>

                      </div>
                      <div style="text-align: center;" class="form-group">
                          <div class="col-lg-12">
                            <input class="btn btn-primary" type="submit" name="save_{{ $setting_items->id }}" id="save_{{ $setting_items->id }}" value="Save">
                            <input class="btn btn-primary" type="reset" value="Reset">
                            <a class="btn btn-primary" href="{{ route('admin_index') }}">Cancel</a>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach





          </div>
        </div>

      <!-- </div>
    </div> -->
@endsection
