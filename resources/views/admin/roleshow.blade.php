@extends('admin')
@section('contain')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Show Role</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $role->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <table>
                            <thead>
                                <tr>
                                <th data-column-id="permissions" data-order="desc">Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($role->permissions as $permission)
                                    <tr>
                                        <td>{{ $permission['admin'] }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-default">Edit</a>
                        <div class="row pull-right">
                            <div class="col-sm-2 text-center" data-column-id="forme">
                                <p><button id="delete" class="btn btn-danger sweet-4" data-id='{{ $role->id }}' name ='delete'>Delete</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('addscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <script type="text/javascript" >
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#delete').on('click', function(event){
              var  button = $(this).data('id') ;  
              swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: true
                },
                function() {
                  $.ajax({
                  
                    route: 'role.destroy' + button,
                    method : "delete"
                  
                  })
                  .done(function(data) {
                  
                  swal({
                      title:"Deleted!",
                      text:"Your imaginary file has been deleted.",
                      type: "success"
                      
                  }, 
                  function(){
                    window.location.href = '/user';
                  
                  });
                  })
                  .fail(function() {
                    swal("Error", "Your imaginary file is safe :)", "error");
                  });
               
                });
              });
        });
    </script>
@stop