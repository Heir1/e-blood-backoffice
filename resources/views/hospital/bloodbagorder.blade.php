@extends('hospital_layout.master')

@section('title')
    Stocks
@endsection

@section('content')
	<!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>Stocks</h1>
           </div>
           {{-- <div class="content-header-right">
              <a href="{{ url('admin/addstock', []) }}" class="btn btn-primary btn-sm">Ajouter un nouveau</a>
           </div> --}}
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

         @if (Request::is('hospital/bloodbagsearch/*'))
            <div class="row">
               <div class="col-md-12">
                     <div class="callout callout-danger">
                        <button type="button" class="close" style="color: white" aria-label="Close" onclick="closediv(this)">
                           <span aria-hidden="true">&times;</span>
                        </button>
                        <p>jkgsyugd ugshgd</p>
                     </div>
               </div>
            </div>
         @else
             
         @endif
        <section class="content">
           <div class="row">
              <div class="col-md-12">
                 <div class="box box-info">
                    <div class="box-body table-responsive">
                       <table id="example1" class="table table-bordered table-hover table-striped">
                          <thead>
                             <tr>
                                <th>#</th>
                                {{-- <th>Hôpital</th>
                                <th>Adresse</th>
                                <th>Email</th> --}}
                                <th>Date</th>
                                <th>Panier</th>
                                <th>Actions</th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$increment++}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @foreach ($order->cart->items as $item)
                                            {{$item['qty'].' poche(s)  '.$item['designation'].' ;'}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('hospital/bloodbaginvoice', [$order->timeid]) }}" target="_blank" class="btn btn-primary btn-xs">Voir la facture</a>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                       </table>
                    </div>
                 </div>
        </section>
    </div>
    <!-- end content -->
@endsection