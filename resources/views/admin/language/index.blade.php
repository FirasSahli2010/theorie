@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{ __('Languages') }}</h3>
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
          <!-- <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Filter " aria-label="Search" />
        </div> -->


        <div class="panel-body container col-md-12" style="text-align: left; ">
            <!-- <button type="button" class="btn btn-link"> -->
            <a role="link" class="btn btn-primary"  href="/admin/language/add/" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                    <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                </svg>  &nbsp; Add Language </a><!--</button> -->

                <!-- <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="language/mylanguageDeleteAll">Delete All Selected</button> -->
        </div>
        <div class="table-responsive" >
        <!-- <table class="table table-striped table-sm"> -->
          <table id="data_table" class="table table-striped table-hover table-sm table table-bordered" >
          <thead>
            <tr>
              <!-- <th width="50px"><input type="checkbox" id="master"></th>
                <div class="fht-cell" style="width: 36.8px;"></div>
              </th> -->
              <th >@sortablelink('name', 'Name')</th>
              <th>@sortablelink('code','Code')</th>
              <th>@sortablelink('shw', 'Enabled')</th>
              <th>@sortablelink('is_default', 'Default')</th>
              <th>@sortablelink('locale', 'Locale')</th>
              <th>@sortablelink('translation', 'Translation') </th>
              <th>@sortablelink('updated_at','Last update')</th>
              <th style="text-align: center;">Operations</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($languages as $language)
              <tr id="tr_{{ $language->id }}" role="row">
                <!-- <td style="text-align: center; vertical-align: middle; width:36px; ">
                  <input type="checkbox" class="sub_chk" data-id="{{ $language->id }}">
              </td> -->

                <td class="card-body">{{ $language->name }}</td>
                <td class="card-body">{{ $language->code }}</td>

                <td>
                  @if ($language->shw  == 'Y')
                    <button style="background-color: #00913B;" type="button" title="Disable" class="btn btn-success" onclick="window.location.replace('/admin/language/{{ $language->id }}/disable')">
                                Enabled
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle2-on" viewBox="0 0 16 16">
                  <path d="M7 5H3a3 3 0 0 0 0 6h4a4.995 4.995 0 0 1-.584-1H3a2 2 0 1 1 0-4h3.416c.156-.357.352-.692.584-1z"></path>
                  <path d="M16 8A5 5 0 1 1 6 8a5 5 0 0 1 10 0z"></path>
                </svg>
              </button>
                  @else
                    <button type="button" title="Enable" class="btn btn-outline-danger" onclick="window.location.replace('/admin/language/{{ $language->id }}/enable')">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                      <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"></path>
                        </svg>
                        Disabled
                            </button>
                  @endif
                </td>
                <td>

                  @if ($language->is_default  == 'Y')
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#D8A45B" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                                Default
                  @else
                    @if($language->shw == 'Y')
                      <button style="background-color: #transparent;" type="button" title="set Default" class="btn btn-link" onclick="window.location.replace('/admin/language/{{ $language->id }}/set_default')">

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>

                  </svg>
                  Set Default
                </button>
                  @endif
                  @endif
                </td>
                <td class="card-body">{{ $language->locale }}</td>
                <td class="card-body">{{ $language->translation }}</td>
                <td class="card-body">{{ $language->updated_at }}</td>

                <td style="text-align: center; width:auto;">

                                        <a href="/admin/language/{{ $language->id }}/edit/"
                                            @if ($language->shw == 'N')
                                              class="form-control" disabled
                                            @else
                                              class="btn btn-xs btn-primary edit"
                                            @endif
                                             id="{{ $language->id }}">
                                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                          Edit
                                        </a>

                                </td>


              </tr>
            @endforeach

            {{ $languages->appends(['sort' => 'title'])->links() }}
          </tbody>
        </table>
        </div>
      <!-- </div>
    </div> -->
@endsection
