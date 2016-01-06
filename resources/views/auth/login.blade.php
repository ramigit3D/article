@extends('app')
@section('container')
<div class="middlePage">
    <div class="page-header">
        <h1 class="logo" align="center">Welcome </h1>
    </div>
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
            <div class="panel-body">
            
                <div class="row">
                
                <div class="col-md-5" >
                    <a href="#"><img src="http://techulus.com/buttons/fb.png" /></a><br/>
                    <a href="#"><img src="http://techulus.com/buttons/tw.png" /></a><br/>
                    <a href="#"><img src="http://techulus.com/buttons/gplus.png" /></a>
                </div>
                    
                <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                    <form id="signin" class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                    	{!! csrf_field() !!}
                        <fieldset>
                        
                            <input id="textinput" name="email" type="text" placeholder="Enter Email" class="form-control input-md">
                            <div class="spacing"><input type="checkbox" name="remember" id="checkboxes-0" value="1"><small> Remember me</small></div>
                            <input id="textinput" name="password" type="password" placeholder="Enter Password" class="form-control input-md">
                            <div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>
                            <button id="singlebutton" name="singlebutton" class="btn btn-info btn-sm pull-right">Sign In</button>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop