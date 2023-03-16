@extends('admin_layout.master')

@section('title')
    Volumes
@endsection

@section('content')
	<!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>Les volumes de sangs disponibles</h1>
           </div>
           <div class="content-header-right">
            <a href="{{ url('admin/addvolume', []) }}" class="btn btn-primary btn-sm">Ajouter un nouveau volume de sang</a>
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
                                <th>Quantité</th>
                                <th>Actions</th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach ($masses as $masse)
                                <tr>
                                    <td>{{$increment++}}</td>
                                    <td>{{$masse->qty.$masse->unity}}</td>
                                    <td style=" display: flex ">
                                       <a href="{{ url('admin/editvolume', [$masse->id]) }}" class="btn btn-primary btn-xs">Modifier</a>
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