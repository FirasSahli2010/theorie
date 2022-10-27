@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{ __('Roles') }}</h3>
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
        <input type="text" class="form-control" placeholder="Filter " aria-label="Search" />
      </div>

      <div class="panel-body container col-md-12" style="text-align: left; ">
          <!-- <button type="button" class="btn btn-link"> -->
          <a role="link" class="btn btn-primary"  href="/admin/roles/create/" >
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
                  <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                  <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
              </svg>  &nbsp; Add Role </a><!--</button> -->

              <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="roles/myroleDeleteAll">Delete All Selected</button>
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


            <th>@sortablelink('updated_at','Last update')</th>
            <th colspan="4" style="text-align: center;">Operations</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($roles as $role)
            <tr id="tr_{{ $role->id }}" role="row">
              <td style="text-align: center; vertical-align: middle; width:36px; ">
                <input type="checkbox" class="sub_chk" data-id="{{ $role->id }}">
            </td>

              <td class="card-body">{{ $role->name }}</td>


              <td class="card-body">{{ $role->updated_at }}</td>

              <td style="text-align=center; width:auto;">
                <a class="btn btn-xs btn-info" href="/admin/roles/{{ $role->id }}/">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg> Details
                </a>
              </td>

              <td style="text-align: center; width:auto;">
                                      <a href="/admin/roles/{{ $role->id }}/edit/" class="btn btn-xs btn-primary edit" id="{{ $role->id }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Edit
                                      </a>

                              </td>
                              <td style="text-align: center; width:auto;">
                                  <a onclick="return confirm('Are you sure you want to delete?')" href="/admin/roles/{{ $role->id }}/delete" class="btn btn-xs btn-danger delete" id="{{ $role->id }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                      Delete
                                  </a>
                              </td>


            </tr>
          @endforeach

          {{ $roles->appends(['sort' => 'name'])->links() }}
        </tbody>
      </table>
      </div>

    <script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {


                var check = confirm("Are you sure you want to delete this row?");
                if(check == true) {


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        /* type: 'DELETE', */
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          window.location.replace("/admin/roles/");
                            // if (data['success']) {
                            //     // $(".sub_chk:checked").each(function() {
                            //     //     $(this).parents("tr").remove();
                            //     // });
                            //     alert(data['success']);
                            // } else if (data['error']) {
                            //     alert(data['error']);
                            // } else {
                            //     alert('Whoops Something went wrong!!');
                            // }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  // $.each(allVals, function( index, value ) {
                  //     $('table tr').filter("[data-row-id='" + value + "']").remove();
                  // });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            // e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                  window.location.replace("/admin/roles/");
                    // if (data['success']) {
                    //     $("#" + data['tr']).slideUp("slow");
                    //     alert(data['success']);
                    // } else if (data['error']) {
                    //     alert(data['error']);
                    // } else {
                    //     alert('Whoops Something went wrong!!');
                    // }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
  <!-- </div>
</div> -->
@endsection
