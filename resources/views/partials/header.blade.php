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
                <li class="active"><a href="/">{{ trans('app.home') }}</a></li>
                   <?php $user = \Sentinel::getUser() ?>
                    @if (!$user)
                    <li{{ Request::is('login') ? ' class="active"' : null }}><a href="{{ URL::to('login') }}">{{ trans('app.login') }}</a></li>
                    <li{{ Request::is('register') ? ' class="active"' : null }}><a href="{{ URL::to('register') }}">{{ trans('app.register') }}</a></li>
                    @elseif (Sentinel::hasAccess('admin'))
                   
                    @endif 
                    
                    @if ($user)
  					    <li class="dropdown">
  					        
  					        <a href="{{ URL::to('account') }}" class="dropdown-toggle" data-toggle="dropdown">{{ trans('app.account') }}<span class="caret"></span>
              					@if ( ! Activation::completed($user))
              					<span class="label label-danger">Inactive</span>
              					@endif
              				</a>
              				@if (Sentinel::hasAccess('admin'))
              				<ul class="dropdown-menu">
                                <li><a href="{{ URL::to('admin/index') }}" align="center">{{ trans('app.dashboard') }}</a></li>
                            </ul>
              				@else
                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('account') }}" align="center">{{ trans('app.profil') }}</a></li>
                                <li><a href="{{ URL::to('account/edit') }}" align="center"> {{ trans('app.editaccount') }}</a></li>
                                <li><a href="{{ URL::to('account/password') }}"  align="center">{{ trans('app.changemp') }}</a></li>
                            </ul>
                            @endif 
              				
          				</li>
          				
      				    <li><a href="{{ URL::to('logout') }}"><span class="menu-icon"><i class="fa fa-sign-out"></i></span>{{ trans('app.logout') }}</a></li>
      				@endif
      				<li><a href = "{{  URL::to(route('language', ["locale" => 'fr'])) }}"><img src="/images/fr.png"  /></a></li>
      				<li><a href = "{{ URL::to(route('language',  ["locale" => 'en'])) }}"><img src="/images/en.png"  /></a></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav><!--/nav-->
