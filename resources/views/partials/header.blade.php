<nav class="navbar navbar-inverse" role="banner">
    <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                

                <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="logo"></a>
            </div>
        
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                   <?php $user = \Sentinel::getUser() ?>
                    @if (!$user)
                    <li{{ Request::is('login') ? ' class="active"' : null }}><a href="{{ URL::to('login') }}">Login</a></li>
                    <li{{ Request::is('register') ? ' class="active"' : null }}><a href="{{ URL::to('register') }}">Register</a></li>
                    @elseif (Sentinel::hasAccess('admin'))
                   
                    @endif 
                    
                    @if ($user)
  					    <li class="dropdown">
  					        
  					        <a href="{{ URL::to('account') }}" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span>
              					@if ( ! Activation::completed($user))
              					<span class="label label-danger">Inactive</span>
              					@endif
              				</a>
              				@if (Sentinel::hasAccess('admin'))
              				<ul class="dropdown-menu">
                                <li><a href="{{ URL::to('admin/index') }}" align="center">dashboard</a></li>
                            </ul>
              				@else
                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('account') }}" align="center">Profile</a></li>
                                <li><a href="{{ URL::to('account/edit') }}" align="center">Edit Account</a></li>
                                <li><a href="{{ URL::to('account/password') }}"  align="center">Change Passowrd</a></li>
                            </ul>
                            @endif 
              				
          				</li>
          				
      				    <li><a href="{{ URL::to('logout') }}"><span class="menu-icon"><i class="fa fa-sign-out"></i></span>  Logout</a></li>
      				@endif
      				<li><img src="/images/fr.png"  /></li>
      				<li><img src="/images/en.png"  /></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav><!--/nav-->
