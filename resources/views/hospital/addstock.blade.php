@extends('hospital_layout.master')

@section('title')
    Ajouter un stock
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Ajouter un stock</h1>
            </div>
            <div class="content-header-right">
                <a href="{{ url('hospital/stocks', []) }}" class="btn btn-primary btn-sm">Voir tous les stocks</a>
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
                    <form class="form-horizontal" action=" {{ url('hospital/savestock', []) }} " method="post" onsubmit="disableButton">
                        @csrf
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Désignation <span>*</span></label>
                                    <div class="col-sm-4">
                                    <select name="designation" class="form-control select2" required>
                                        <option value="">Veuillez séléctionner</option>
                                        @foreach ($bloodbags as $bloodbag)
                                            <option value="{{$bloodbag->designation}}">{{$bloodbag->designation}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Numéro du lot <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="batchcode" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Quantité <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="number" class="form-control" name="bloodsquantity" min="1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Date de prélèvement <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="date" class="form-control" name="collectiondate" min="1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Date d'expiration <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="date" class="form-control" name="expirationdate" min="1" required>
                                    {{-- <input type="date" id="theDate" class="form-control" name="bloodsquantity" min="1" required> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3"></label>
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1" id="form1">Ajouter</button>
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