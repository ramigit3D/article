@extends('admin')
@section('contain')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All Articles</h1>
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
                        <th data-column-id="title" >Title</th>
                        <th data-column-id="lang" >Lang</th>
                        <th data-column-id="published_at" data-converter="datetime">Published At</th>
                        <th data-column-id="tags" data-order="desc">Tags</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->lang }}</td>
                                <td>{{ $article->published_at }}</td>
                                <td>
                                @foreach ($article->tags as $tag)
                                <li> {{ $tag->name }}</li>
                                @endforeach
                                </td>
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
            "commands": function(column, row){
              return '<button type="button" class="btn btn-xs btn-default command-edit" data-row-id="' + row.id + '"><span class="glyphicon glyphicon-folder-open" onclick="window.location = \'articles/'+ row.id +'\'"></span></button>';
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