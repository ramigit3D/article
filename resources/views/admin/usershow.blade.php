<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Dashboard</title>
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/metisMenu.css" rel="stylesheet">
    <link href="/css/timeline.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/morris.css" rel="stylesheet">
    <link href="/css/font-admin2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"  />

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
                <a class="navbar-brand" href="index.html">{{ $admin->first_name  }}</a>
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
     <!-- Sweet alert -->
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

</body>

</html>
