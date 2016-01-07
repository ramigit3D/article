@extends('admin')
@section('contain')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Show User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
  
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $user->first_name . "  " . $user->last_name }}</h3>
  </div>

  <div class="panel-body">
    {{ $user->email }}
  </div>

    

  <div class="panel-footer">
  
    <a href="{{ ('/admin/user/edit') }}" class="btn btn-default">Edit</a>
    
    
    
    <div class="row pull-right">
      <div class="col-sm-2 text-center" data-column-id="forme">
      
      <p><button id="delete" class="btn btn-danger sweet-4" data-id='{{ $user->id }}' name ='delete'>Delete</button></p>
      
      </div>
   
    </div>
</div>
                </div>
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
                  
                    route: 'user.destroy' + button,
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