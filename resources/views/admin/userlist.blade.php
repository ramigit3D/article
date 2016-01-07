<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/metisMenu.css" rel="stylesheet">
    <link href="/css/timeline.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/morris.css" rel="stylesheet">
    <link href="/css/font-admin2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css"  />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <?php $admin = \Sentinel::getUser() ?>
                <a class="navbar-brand" href="index">{{ $admin->first_name }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a   href="/">
                        <i class="fa fa-home"></i> Home
                    </a>
      
                    
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/admin/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="/user"><i class="fa fa-user"></i> Users</span></a>
                           
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-thumbs-o-up"></i> Roles</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Articles<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                 <li>
                                    <a href="panels-wells.html">List Articles</a>
                                </li>
                                <li>
                                    <a href="panels-wells.html">Add Article</a>
                                </li>
                                </ul>
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/js/raphael-min.js"></script>
  

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
     
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

</body>

</html>
