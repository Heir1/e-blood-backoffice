@extends('admin_layout.master')

@section('title')
    Créer une poche
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Créer une poche de sang</h1>
            </div>
            <div class="content-header-right">
                <a href="{{ url('admin/bloodbags', []) }}" class="btn btn-primary btn-sm">Voir toutes les poches</a>
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
        @if (count($errors) > 0)
        <section class="content" style="min-height:auto;margin-bottom: -30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-danger">
                        <button type="button" class="close" style="color: white" aria-label="Close" onclick="closediv(this)">
                            <span aria-hidden="true">&times;</span>
                         </button>
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action=" {{ url('admin/createbloodsbag', []) }} " method="post">
                        @csrf
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Type de sang <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="type" class="form-control select2" required>
                                                <option value="">Veuillez séléctionner le type</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Rhésus <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="rhesus" class="form-control select2" required>
                                                <option value="">Veuillez séléctionner le rhésus</option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Masse <span>*</span></label>
                                    <div class="col-sm-4">
                                        <select name="mass" class="form-control select2" required>
                                                <option value="">Veuillez séléctionner la masse de la poche</option>
                                                <option value="200 ml">200 ml</option>
                                                <option value="500 ml">500 ml</option>
                                                <option value="1000 ml">1000 ml</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Créer</button>
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

{{-- <input type="text" class="form-control" name="designation" required pattern="\S(.*\S)?" title="Ce champ est requis"> --}}
{{-- <input required pattern=".*\S+.*" title="This field is required"> 
<input required pattern="\S(.*\S)?" title="This field is required">--}}