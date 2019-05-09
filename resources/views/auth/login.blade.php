@extends('layouts.app')
@section('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/app.css" media="all">
    <style>
        .header-top-left h1 {
            margin: 5px;
        }
        .col-md-offset-2 {
            margin-left: auto;
            margin-right: auto;
            float: inherit;
        }
        .container {
            width: 100%;
        }
        .panel-default {
            border-color: white;
            box-shadow: none;
        }
        .panel-default>.panel-heading {
            color: #333;
            background-color: #fff;
            border-color: #d3e0e9;
        }
        .login-or {
            margin: 0 30px 20px 30px;
            text-align: center;
            height: 20px;
        }
        .or-left, .or-right {
            height: 2px;
            width: 245px;
            margin: 10px 0;
        }
        .or-left {
            background: linear-gradient(to right,rgba(255,255,255,1) 0,rgba(187,187,187,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#bbbbbb',GradientType=1);
            float: left;
        }
        .or-right {
            background: linear-gradient(to right,rgba(187,187,187,1) 0,rgba(255,255,255,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#bbbbbb',endColorstr='#ffffff',GradientType=1);
            float: right;
        }
        .login-social {
            margin: auto;
            width: 75%;
            height: 40px;
        }
        .login .login-social .login-facebook {
            float: left;
        }
        .login .login-social .login-facebook, .login .login-social .login-google {
            height: 38px;
            border: 1px solid #d7d7d7;
            width: 210px;
        }
        .login .login-social .login-facebook span, .login .login-social .login-facebook div {
            color: #055698;
        }
        .login .login-social .login-facebook div, .login .login-social .login-google div {
            width: 20px;
            height: 20px;
            margin: 9px;
            font-size: 22px;
            float: left;
        }
        .login .login-social .login-google a, .login .login-social .login-google div {
            color: #EB4F38;
        }
        .login .login-social .login-google {
            float: right;
        }
        .login .login-social .login-facebook a, .login .login-social .login-google a {
            font-size: 13px;
        }
        .login .login-social .login-facebook a, .login .login-social .login-facebook div {
            color: #055698;
        }
        .login .login-social .login-facebook a, .login .login-social .login-google a {
            line-height: 38px;
            float: left;
            cursor: pointer;
            display: block;
            width: 150px;
            height: 38px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .header-top-left h1 {
            margin: 0px;
        }
        .header-top {
            height: 142px!important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default login">
                    <div class="panel-heading">Đăng nhập</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="font-size: 14px">
                                        Đăng nhập
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 13px">
                                        Tìm lại mật khẩu?
                                    </a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="login-or"><div class="or-left"></div>Hoặc<div class="or-right"></div></div>
                            <div class="login-social">
                            <div class="login-facebook"><div class="fa fa-facebook-square"></div><a href="/auth/facebook">Đăng nhập qua Facebook</a><input type="hidden" id="hddFacebookToken" value=""></div><div class="login-google"><div class="fa fa-google-plus-square"></div><a href="/auth/google">Đăng nhập qua Google</a></div></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentJS')

@endsection

