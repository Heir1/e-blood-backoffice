@extends('admin_layout.master')

@section('title')
    Ajouter un programme
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>Ajouter un programme de dons de sangs</h1>
            </div>
            <div class="content-header-right">
                <a href="{{ url('admin/bloodgiftprogram', []) }}" class="btn btn-primary btn-sm">Voir touts les programmes</a>
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
                    <form class="form-horizontal" action=" {{ url('admin/savebloodgiftprogram', []) }} " method="post">
                        @csrf
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Date <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" name="p_date" class="form-control" required>
                                    </div>
                                    {{-- $this->validate($request, [
                                        'time_start' => 'date_format:H:i',
                                        'time_end' => 'date_format:H:i|after:time_start',
                                    ]); --}}
                                
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Heure du début <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="time" name="p_starthour" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Heure de fin <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="time" name="p_endhour" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3">Nom du camp <span>*</span></label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" name="campname" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Ajouter</button>
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