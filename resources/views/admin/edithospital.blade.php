@extends('admin_layout.master')

@section('title')
    Editer
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Editer l'hopital</h1>
            </div>
            <div class="content-header-right">
                <a href="{{ url('admin/hospitals', []) }}" class="btn btn-primary btn-sm">Retour</a>
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
                    <form class="form-horizontal" action=" {{ url('admin/updatehospital', [$hospital->id]) }} " method="post">
                        @csrf
                        @method('PUT')
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2">Nom <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hospital_name" value="{{$hospital->hospital_name}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2">Adresses <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hospital_address" value="{{$hospital->hospital_address}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2">Email <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="email" class="form-control" name="hospital_email" value="{{$hospital->hospital_email}}"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2">Téléphone <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hospital_phone" value="{{$hospital->hospital_phone}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2">Mot de passe <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hospital_password" value="{{$hospital->hospital_password}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- control-label --}}
                                    <label for="" class="col-sm-2"></label>
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- end content -->
@endsection