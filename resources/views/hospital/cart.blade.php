@extends('hospital_layout.master')

@section('title')
    Panier
@endsection

@section('content')
	<!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>Panier</h1>
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
                                  <th>Désignation</th>
                                  <th>Prix unitaire</th>
                                  <th>Quantité</th>
                                  <th>Prix total</th>
                                  <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @if (Session::has("cart"))
                                    @foreach (Session::get('topCart') as $item)
                                        <tr>
                                            <td>{{$item['designation']}}</td>
                                            <td>{{$item['bloodsprice']}} FC</td>
                                            <td>
                                            <form action="{{ url('hospital/udateqty', [$item['product_id']]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" min="1" name="qty" required value="{{$item['qty']}}">
                                                <input type="submit" class="btn btn-primary btn-xs" value="Modifier">
                                            </form>
                                            </td>
                                            <td>{{$item['bloodsprice']*$item['qty']}} FC</td>
                                            <td>
                                                <form action="{{ url('hospital/deletebloodbag', [$item['product_id']]) }}" method="post">
                                                   @csrf
                                                   @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-xs" value="X">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                         </table>
                    </div>
                    <br>
                    <div class="box-body table-responsive">
                        @if (Session::has("cart"))
                           <table class="table table-bordered table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th>Total à payer</th>
                                    <th>{{Session::get('cart')->totalPrice}} FC</th>
                                    <th>
                                       <form action="http://marchand.maishapay.online/payment/vers1.0/merchant/checkout" method="post">
                                          @csrf
                                          <input type="hidden" name="gatewayMode" value="1">

                                          <input type="hidden" name="publicApiKey" value="MP-LIVEPK-$1oOa5uuIor0y.1WdiPi1b5eW7em3$S1qqecrO1eit$0XKjFEPVNCslV/gn0$buQa$FRC2$yPy7csObk.az.2WEKBC2w5oneUMJI1pygJIHH20TqmBiVIr3a">

                                          <input type="hidden" name="secretApiKey" value="MP-LIVEPK-zaXken$$RxLKOJ0VKgoqU1cKFmB2q$lDk3x19sQBLrM0gxJnr10VFlD.M/yT.FyJvNAgqAB1ewwIypDjQVg90hiCQ6I2GecaEdig1Iq1$ylevK$ff5h$Qssz">

                                          <input type="hidden" name="transactionReference" value="ABCD">

                                          <input type="hidden" name="montant" value="100">
                                          <input type="hidden" name="devise" value="USD">
                                          <input type="hidden" name="customerFullName" value="Jared">
                                          <input type="hidden" name="customerPhoneNumber" value="">
                                          <input type="hidden" name="customerEmailAddress" value="">
                                          
                                          <input type="hidden" name="chanel" value="MOBILEMONEY">
                                          <input type="hidden" name="provider" value="MPESA">
                                          <input type="hidden" name="walletID" value="+243813870415">
                                          <input type="hidden" name="callbackUrl" value="http://127.0.0.1:8000/hospital/bloodbagsearch">
                                          <input type="submit" class="btn btn-success btn-xs" value="Payer avec votre compte mobile money">
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