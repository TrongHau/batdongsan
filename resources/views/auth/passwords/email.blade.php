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

    </style>
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 14px;">Đặt lại mật khẩu</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="font-size: 14px">
                                        Gửi liên kết đặt lại mật khẩu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentJS')

@endsection


