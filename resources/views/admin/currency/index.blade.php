@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{ __('Currencies') }}</h3>
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



        <div class="table-responsive" >
        <!-- <table class="table table-striped table-sm"> -->
          <table id="data_table" class="table table-striped table-hover table-sm table table-bordered" >
          <thead>
            <tr>
              <!-- <th width="50px"><input type="checkbox" id="master"></th>
                <div class="fht-cell" style="width: 36.8px;"></div>
              </th> -->
              <th >@sortablelink('name', 'Name')</th>
              <th >@sortablelink('nameen', 'Name')</th>
              <th>@sortablelink('symbol','Symbol')</th>
              <th>@sortablelink('symbolen', 'Symbol')</th>
              <th>@sortablelink('price', 'Price')</th>
              <th>@sortablelink('updated_at','Last update')</th>
              <th style="text-align: center;">Operations</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($currencies as $currency)
              <tr id="tr_{{ $currency->id }}" role="row">
                <!-- <td style="text-align: center; vertical-align: middle; width:36px; ">
                  <input type="checkbox" class="sub_chk" data-id="{{ $currency->id }}">
              </td> -->

                <td class="card-body">{{ $currency->name }}</td>
                <td class="card-body">{{ $currency->nameen }}</td>
                <td class="card-body">{{ $currency->symbol }}</td>
                <td class="card-body">{{ $currency->symbolen }}</td>
                <td class="card-body">{{ $currency->price }}</td>



                <td class="card-body">{{ $currency->updated_at }}</td>

                <td style="text-align: center; width:auto;">
                      @if ($currency->id != 1)
                          <a href="/admin/currency/{{ $currency->id }}/edit/" class="btn btn-xs btn-primary edit" id="{{ $currency->id }}" >
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit
                          </a>
                      @endif

                  </td>


              </tr>
            @endforeach

            {{ $currencies->appends(['sort' => 'name'])->links() }}
          </tbody>
        </table>
        </div>
      <!-- </div>
    </div> -->
@endsection
