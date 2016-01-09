@extends('admin')
@section('contain')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            <h1 class="page-header">Roles</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <table id="table-articles" class="table table-condensed table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                            <th data-column-id="name" >Name</th>
                            <th data-column-id="slug" data-order="desc">Slug</th>
                            <th data-column-id="permissions" data-order="desc">Permissions</th>
                            <th data-column-id="published_at" data-converter="datetime">created_at</th>
                            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name}}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ $role->permissions }}</td>
                                <td>{{ $role->created_at }}</td>
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

@endsection    
@push('addscript')
    <script>
        $(document).ready(function(){
        
            $("#table-articles").bootgrid({
                formatters: {
                    "commands": function(column, row)
                    {
                        return '<button type="button" class="btn btn-xs btn-default command-edit" data-row-id="' + row.id + '" onclick="window.location = \'role/'+ row.id +'\'"><span class="glyphicon glyphicon-folder-open" ></span></button>';
                    }
                },
                converters: 
                {
                    datetime: 
                    {
                        from: function (value) 
                    {
                    console.log(value);
                    return moment(value); 
                    },
                    to: function (value)
                    { 
                        return value.fromNow(); 
                    }
                    }
                }
            });
        
        });  
        
    
    </script>     

@stop