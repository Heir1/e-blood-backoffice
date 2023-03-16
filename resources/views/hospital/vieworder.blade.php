@extends('hospital_layout.master')

@section('title')
    Commande
@endsection

@section('content')
	<!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>Commande</h1>
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
         
        <section class="content">
           <div class="row">
              <div class="col-md-12">
                 <div class="box box-info">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                               <tr>
                                    {{-- <th>Hôpital</th> --}}
                                    <th>Désignation</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantité</th>
                                    {{-- <th>Prix total</th> --}}
                                    {{-- <th>Action</th> --}}
                               </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->designation}}</td>
                                        <td>{{$invoice->price}} FC</td>
                                        <td>
                                            <form action="{{ url('hospital/validateorder', [$invoice->orderid, $invoice->hospital,$invoice->designation]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" min="1" max="" name="qty" required value="{{$invoice->qty}}">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Valider">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>
                    <br>
                    <div class="box-body table-responsive">
                        @if (Session::has("cart") && Session::get('cart')->totalPrice > 0)
                           <table class="table table-bordered table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th>Total à payer</th>
                                    <th>{{Session::get('cart')->totalPrice}} FC</th>
                                    <th>
                                       <form action="{{ url('hospital/pay', []) }}" method="post">
                                          @csrf
                                          <input type="submit" class="btn btn-success btn-xs" value="Commander">
                                       </form>
                                    </th>
                                 </tr>
                              </thead>
                           </table>
                        @endif
                    </div>
                 </div>
        </section>
    </div>
    <!-- end content -->
@endsection