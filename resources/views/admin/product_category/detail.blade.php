@extends('layouts.admin.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="container" >
      <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">{{ $category->title }}</h3>
            </div>
        </div>
      </div>

        <!-- <table class="table table-striped table-sm"> -->
        <div class="row col-12 row-cols-2">
          <div class="row col-6  row-cols-2 p-4 ">

              <div class="border bg-light col-3 col p-4 g-4" >
                Language
              </div>
              <div class="border bg-light col-9 col p-4 g-4" >
                {{ (\App\Http\Controllers\LanguagesController::get_language_name($category->language)) }}
              </div>

              <div class="border bg-light col-3 col p-4 g-4" >
                Parent Category
              </div>
              <div class="border bg-light col-9 col p-4 g-4" >
                {{ $category->parent_category }}
              </div>

              <div class="border bg-light col-3 col p-4 g-4" >
                last update
              </div>
              <div class="border bg-light col-9 col p-4 g-4" >
                {{ $category->updated_at }}
              </div>
          </div>

          <div class="row col-6 row-cols-2 p-4 ">
              <div class="border bg-light col-3 col p-4 g-4" >
                Description
              </div>
              <div class="border bg-light col-9 col p-4 g-4" >
                {{ $category->desc }}
              </div>
          </div>
        </div>
      </div>

    <div class=" row col-12 row-cols-5 g-5 p-4">
      <div style="text-align: center;"  class="border bg-light col col p-4 g-4" >
        <a class="btn btn-primary border" href="/admin/product_category/">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
          </svg> Back
        </a>
      </div>
      <div style="text-align: center;" class="border bg-light col col p-4 g-4" >
        @if ($category->shw  == 'Y')
          <button style="background-color: #00913B;" type="button" title="Draft" class="btn btn-success" onclick="window.location.replace('/admin/product_category/{{ $category->id }}/disable')"
            @if ($category->trashed())
              class="form-control" disabled
            @else
              class="btn btn-xs btn-primary edit"
            @endif
            >
            Published
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle2-on" viewBox="0 0 16 16">
              <path d="M7 5H3a3 3 0 0 0 0 6h4a4.995 4.995 0 0 1-.584-1H3a2 2 0 1 1 0-4h3.416c.156-.357.352-.692.584-1z"></path>
              <path d="M16 8A5 5 0 1 1 6 8a5 5 0 0 1 10 0z"></path>
            </svg>
          </button>
        @else
          <button type="button" title="Enable" class="btn btn-outline-danger" onclick="window.location.replace('/admin/product_category/{{ $category->id }}/enable')"
            @if ($category->trashed())
              class="form-control" disabled
            @else
              class="btn btn-xs btn-primary edit"
            @endif
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
              <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"></path>
            </svg>
            Draft
          </button>
        @endif
      </div>
      <div style="text-align: center;"  class="border bg-light col col p-4 g-4" >
        <a class="btn btn-primary  border" role="button" href="/admin/product_category/{{ $category->id }}/edit/">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg>
          Edit
        </a>
      </div>
      <div style="text-align: center;"  class="border bg-light col col p-4 g-4" >
        @if ($category->trashed())
          <a onclick="return confirm('Are you sure, you want to restore?')" href="/admin/product_category/{{ $category->id }}/restore" class="btn btn-success" id="{{ $category->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-life-preserver" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm6.43-5.228a7.025 7.025 0 0 1-3.658 3.658l-1.115-2.788a4.015 4.015 0 0 0 1.985-1.985l2.788 1.115zM5.228 14.43a7.025 7.025 0 0 1-3.658-3.658l2.788-1.115a4.015 4.015 0 0 0 1.985 1.985L5.228 14.43zm9.202-9.202l-2.788 1.115a4.015 4.015 0 0 0-1.985-1.985l1.115-2.788a7.025 7.025 0 0 1 3.658 3.658zm-8.087-.87a4.015 4.015 0 0 0-1.985 1.985L1.57 5.228A7.025 7.025 0 0 1 5.228 1.57l1.115 2.788zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
            Restore
          </a>
        @else
          <a onclick="return confirm('Are you sure you want to delete?')" href="/admin/product_category/{{ $category->id }}/delete" class="btn btn-xs btn-danger delete" id="{{ $category->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            Delete
          </a>
        @endif
      </div>
      <div style="text-align: center;"  class="border bg-light col col p-4 g-4" >
        <a onclick="return confirm('Are you sure you want to destroy this item, this operation can not be reverted?')" href="/admin/product_category/{{ $category->id }}/permdelete" class="btn btn-xs btn-danger" id="{{ $category->id }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
          Destroy
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
