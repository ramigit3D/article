@extends('admin')
@section('contain')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
                   <table id="table-articles" class="table table-condensed table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
      <th data-column-id="title" >Name</th>
      <th data-column-id="tags" data-order="desc">Email</th>
       <th data-column-id="published_at" data-converter="datetime">Created_at</th>
      <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
    </tr>
  </thead>
  <tbody>
    @forelse($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name ."  " . $user->last_name }}</td>
        <td>{{ $user->email }}</td>
         <td>{{ $user->created_at }}</td>
        <td>
          
          
        </td>
      </tr>
   
    @empty
    @endforelse
  </tbody>
    

</table>
                </div>
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
    
@endsection    
@push('addscript')
    <script>
        $(document).ready(function(){
            
            $("#table-articles").bootgrid({
                formatters: {
                    "commands": function(column, row){
                        return '<button type="button" class="btn btn-xs btn-default command-edit" data-row-id="' + row.id + '"><span class="glyphicon glyphicon-folder-open" onclick="window.location = \'user/'+ row.id +'\'"></span></button>';
                    }
                },
                converters: {
                    datetime: {
                        from: function (value) {
                            console.log(value);
                            return moment(value); 
                        },
                            to: function (value) { 
                            return value.fromNow(); 
                        }
                    }
                }
            });
        
        });  
        
    
    </script>     

@stop