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
                <div class="col-sm-9">
                        <div class="tabs widget">
                            <ul class="nav nav-tabs widget">
                                <li class="active"> Profile  </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane active">
                            <div class="pd-20">
                                <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row mgbt-xs-0">
                                            <label class="col-xs-5 control-label">First Name:</label>
                                            <div class="col-xs-7 controls">{{ $user->first_name }}</div>
                                            <!-- col-sm-10 --> 
                                        </div>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="row mgbt-xs-0">
                                        <label class="col-xs-5 control-label">Last Name:</label>
                                        <div class="col-xs-7 controls">{{ $user->last_name }}</div>
                                        <!-- col-sm-10 --> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row mgbt-xs-0">
                                        <label class="col-xs-5 control-label">Email:</label>
                                        <div class="col-xs-7 controls">mariah@Vendroid.com</div>
                                        <!-- col-sm-10 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop