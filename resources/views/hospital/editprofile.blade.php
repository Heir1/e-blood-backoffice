@extends('hospital_layout.master')

@section('title')
    Edit profile
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Edit Profile</h1>
            </div>
            <div class="content-header-right">
                <a onclick="getLocation()" class="btn btn-primary btn-sm">Obtenir la localisation</a>
            </div>
        </section>
        
        @if (Session::has("status"))
            <section class="content" style="min-height:auto;margin-bottom: -30px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-success">
                            <button type="button" class="close" style="color: white" aria-label="Close" onclick="closediv(this)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{Session::get('status')}}</p>
                        </div>
                    </div>
                </div>
            </section> 
        @endif
        @if (Session::has("error"))
            <section class="content" style="min-height:auto;margin-bottom: -30px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-danger">
                            <button type="button" class="close" style="color: white" aria-label="Close" onclick="closediv(this)">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{Session::get('error')}}</p>
                        </div>
                    </div>
                </div>
            </section> 
        @endif
        @if (count($errors) > 0)
        <section class="content" style="min-height:auto;margin-bottom: -30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
                </section>
        @endif
            <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_3" data-toggle="tab">Update Password</a></li>
                        </ul>
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab_3">
                            <form class="form-horizontal" action="{{ url('hospital/updatepassword', [$hospital->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="" class="col-sm-2">New password </label>
                                            <div class="col-sm-4">
                                                <input type="password" class="form-control" name="hospital_password" id="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2">Retype Password </label>
                                            <div class="col-sm-4">
                                                <input type="password" class="form-control" name="hospital_password1" id="re_password" oninput="check(this)" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2">Latitude </label>
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" name="latitude" id="latitude" required onkeypress="return false;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2">Longitude </label>
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" name="longitude" id="longitude" required onkeypress="return false;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-success pull-left" name="form3">Modifier</button>
                                            </div>
                                            <p id="demo"></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    </div>
    <!-- end content -->
@endsection