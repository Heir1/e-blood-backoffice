@extends('hospital_layout.master')

@section('title')
    Prices
@endsection

@section('content')
	<!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>Fixation de prix de produits</h1>
           </div>
           <div class="content-header-right">
            <a href="{{ url('hospital/addprice', []) }}" class="btn btn-primary btn-sm">Fixer le prix d'un produit</a>
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
                       <table id="example1" class="table table-bordered table-hover table-striped">
                          <thead>
                             <tr>
                                <th>#</th>
                                <th>Désignation</th>
                                <th>Prix</th>
                                <th>Actions</th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach ($productprices as $productprice)
                                <tr>
                                    <td>{{$increment++}}</td>
                                    <td>{{$productprice->designation}}</td>
                                    <td>{{$productprice->price}} FC</td>
                                    <td style=" display: flex ">
                                       <a href="{{ url('hospital/editprice', [$productprice->id]) }}" class="btn btn-primary btn-xs">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                       </table>
                    </div>
                 </div>
        </section>
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this item?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
@endsection