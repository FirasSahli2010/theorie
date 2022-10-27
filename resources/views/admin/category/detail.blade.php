@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                      <h3 class="panel-title">{{ __('Categories') }}</h3>
                  </div>
              </div>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Filter " aria-label="Search" />
          </div>


        <div class="panel-body container col-md-12" style="text-align: left; ">
            <!-- <button type="button" class="btn btn-link"> -->
            <a role="link" class="btn btn-default"  href="/admin/category/add/" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                    <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                </svg>  &nbsp; Add Section </a><!--</button> -->
        </div>


    <div class="row py-2">
      <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <div class="form-group">
            <strong>Category Title:</strong>
            {{ $category->title }}
        </div>
      </div>
      @if ($category->id != 1 )
        <div class="col-xs-12 col-sm-12 col-md-12 py-2">
          <div class="form-group">
              <strong>Parent Category:</strong>
              @if ($parent_category->id != 1)
                <a href="/admin/category/{{$parent_category->id}}" class="badge info" style="color: #000;" >
                    {{ $parent_category->title }}
                </a>
              @else
                <a href="/admin/category/{{$parent_category->id}}" class="badge info" style="color: #000;" >
                    {{ __('Root') }}
                </a>
              @endif
          </div>
        </div>
      @else
      <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <div class="form-group">
            <strong>Parent Category:</strong>
          <div class="badge info" style="color: #000; text-align: left; "> ------ </div>
        </div>
      </div>
      @endif
      <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <div class="form-group">
          <strong>Sub Categories:</strong>

          @forelse ($son_categories as $son)
            <div class="badge info" style="color: #000; text-align: left; ">
              <a href="/admin/category/{{$son->id}}" class="badge info" style="color: #000;" >
                  {{ $son->title }}
              </a>
            </div>
          @empty
            {{__('No sub categories')}}
          @endforelse

        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <div class="form-group">
          <strong>Posts:</strong>
        </div>
        <div class="panel-body container col-md-12" style="text-align: left; ">
            <!-- <button type="button" class="btn btn-link"> -->
            <a role="link" class="btn btn-primary"  href="/admin/post/add/" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                    <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                </svg>  &nbsp; new post </a><!--</button> -->

          <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="post/mypostDeleteAll" > Delete All Selected </button>
        </div>
        <div class="table-responsive" >
        <!-- <table class="table table-striped table-sm"> -->
          <table id="data_table" class="table table-striped table-hover table-sm table table-bordered" >
          <thead>
            <tr>
              <th width="50px"><input type="checkbox" id="master"></th>
                <div class="fht-cell" style="width: 36.8px;"></div>
              </th>

              <th >@sortablelink('title')</th>
              <th>@sortablelink('lang')</th>
              <th>@sortablelink('shw', 'Published')</th>
              <th>@sortablelink('updated_at','Last update')</th>
              <th colspan="4" style="text-align: center;">Operations</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
            <tr id="tr_{{ $post->id }}" role="row">
              <td style="text-align: center; vertical-align: middle; width:36px; ">
                <input type="checkbox" class="sub_chk" data-id="{{ $post->id }}">
            </td>

              <td class="card-body">{{ $post->title }}</td>
              <td>{{ (\App\Http\Controllers\LanguagesController::get_language_name($post->language)) }}</td>
              <td>
                @if ($post->shw  == 'Y')
                  <button style="background-color: #00913B;" type="button" title="Draft" class="btn btn-success" onclick="window.location.replace('/admin/post/{{ $post->id }}/disable')" class="btn btn-xs btn-primary edit">
                    Published
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle2-on" viewBox="0 0 16 16">
                <path d="M7 5H3a3 3 0 0 0 0 6h4a4.995 4.995 0 0 1-.584-1H3a2 2 0 1 1 0-4h3.416c.156-.357.352-.692.584-1z"></path>
                <path d="M16 8A5 5 0 1 1 6 8a5 5 0 0 1 10 0z"></path>
              </svg>
            </button>
                @else
                  <button type="button" title="Enable" class="btn btn-outline-danger" onclick="window.location.replace('/admin/post/{{ $post->id }}/enable')" class="btn btn-xs btn-primary edit" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                    <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"></path>
                      </svg>
                      Draft
                          </button>
                @endif
              </td>
              <td class="card-body">{{ $post->updated_at }}</td>

              <td style="text-align=center; width:auto;">
                <a class="btn btn-xs btn-primary edit" href="/admin/post/{{ $post->id }}/">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg> Details
                </a>
              </td>

              <td style="text-align: center; width:auto;">
                                      <!-- <a class="btn btn-primary  border" role="button" href="/post/{{ $post->id }}/edit/"><i class="fa fa-edit white"></i> Edit </a> -->
                                      <!-- <a class="btn btn-primary  border" role="button" href="/post/{{ $post->id }}/edit/">
                                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                      </a> -->

                                      <a href="/admin/post/{{ $post->id }}/edit/" class="btn btn-xs btn-primary edit" id="{{ $post->id }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Edit
                                      </a>

                              </td>
                              <td style="text-align: center; width:auto;">
                                  <!-- <a href ="/post/{{ $post->id }}/delete/" class="btn btn-danger"><i class="fa fa-times white"></i> Delete </a> -->
                                  <!-- <a href ="/post/{{ $post->id }}/delete/" class="btn btn-danger">
                                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                      </svg>
                                  </a> -->

                                    <a onclick="return confirm('Are you sure you want to delete?')" href="/admin/post/{{ $post->id }}/delete" class="btn btn-xs btn-danger delete" id="{{ $post->id }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                      Delete
                                  </a>

                              </td>
                              <!-- <td style="text-align: center; width:auto;">
                                    <a onclick="return confirm('Are you sure you want to destroy this item, this operation can not be reverted?')" href="/admin/post/{{ $post->id }}/permdelete" class="btn btn-xs btn-danger" id="{{ $post->id }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                      Destroy
                                  </a>

                              </td> -->

            </tr>
            @empty
              {{__('No Posts')}}
            @endforelse

          </tbody>
        </table>
        </div>

      </div>
          <!-- <table class="table table-striped table-hover table-sm table table-bordered" >

          <tbody>

            @if ($category)
              <tr role="row">
                <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; "><label>
                  <input data-index="3" name="btSelectItem{{ $category->id }}" type="checkbox" value="{{ $category->id }}">
                  <span></span>
                  </label>
                </td>
                <td class="card-body">{{ $category->title }}</td>
                <td>{{ __('En') }}</td>
                <td>
                  @if ($category->shw  == 'Y')
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                  @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884l-12-12 .708-.708 12 12-.708.708z"/>
                    </svg>
                  @endif
                </td>
                <td class="card-body">{{ $category->updated_at }}</td>

                <td style="text-align=center; width:auto;">
                  <a class="btn btn-primary border" href="/admin/category/{{ $category->id }}/">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                      </svg> Details
                  </a>
                </td>
                <td style="text-align: center; width:auto;">

                                        <a class="btn btn-primary  border" role="button" href="/category/{{ $category->id }}/edit/">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>

                                </td>
                                <td style="text-align: center; width:auto;">

                                    <a href ="/category/{{ $category->id }}/delete/" class="btn btn-danger">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </a>
                                </td>

              </tr>
            @endif


          </tbody>
        </table> -->



</div>
@endsection
