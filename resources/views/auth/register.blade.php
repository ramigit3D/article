@extends('app')
@section('container')



<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
            	@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('app.signup')}}</h3>
                </div>
                <div class="panel-body">
                    <form id = "signup"class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-sm floatlabel" placeholder="{{ trans('app.first')}}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="{{ trans('app.last')}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="{{ trans('app.email')}}">
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="{{ trans('app.password')}}">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirm" id="password_confirmation" class="form-control input-sm" placeholder="{{ trans('app.confirm').' '.trans('app.password')}}">
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" value="{{ trans('app.register')}}" class="btn btn-info btn-block">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
