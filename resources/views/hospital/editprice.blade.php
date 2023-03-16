@extends('hospital_layout.master')

@section('title')
    Fixer le prix du produit
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Modifier le prix {{$productprice->designation}}</h1>
            </div>
            <div class="content-header-right">
                <a href="{{ url('hospital/prices', []) }}" class="btn btn-primary btn-sm">Voir tous les prix</a>
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action=" {{ url('hospital/updateprice', [$productprice->id]) }} " method="post" onsubmit="disableButton">
                        @csrf
                        @method('PATCH')
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Désignation <span>*</span></label>
                                    <div class="col-sm-4">
                                    <select name="designation" class="form-control select2"  required>
                                        <option value="{{$productprice->designation}}">{{$productprice->designation}}</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Prix <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" min="1" name="price" value="{{$productprice->price}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3"></label>
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1" id="form1">Modifier</button>
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