@extends('app')

@section('container')
    
    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel widget light-widget panel-bd-top">
                    <div class="panel-heading no-title"> </div>
                        <div class="panel-body">
                            <div class="text-center vd_info-parent"> <img src="/images/blog/avatar3.png"> </div>
                                
                                <?php $user = \Sentinel::getUser() ?>
                                <h2 class="font-semibold mgbt-xs-5">{{ $user->first_name . $user->last_name  }}</h2>
                                
                            <div class="mgtp-20">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:60%;">Status</td>
                                            @if (Activation::completed($user))
                                            <td><span class="label label-success">Active</span></td>
                                            @endif
                                        </tr>
                                        
                                        <tr>
                                            <td>Member Since</td>
                                            <td> {{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y')  }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="#">
                <div class="form-group">
                <label class="control-label">Current Password</label>
                <input type="password" class="form-control" /> </div>
                <div class="form-group">
                <label class="control-label">New Password</label>
                <input type="password" class="form-control" /> </div>
                <div class="form-group">
                <label class="control-label">Re-type New Password</label>
                <input type="password" class="form-control" /> </div>
                <div class="margin-top-10">
                <a href="javascript:;" class="btn green"> Change Password </a>
                <a href="javascript:;" class="btn default"> Cancel </a>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@stop