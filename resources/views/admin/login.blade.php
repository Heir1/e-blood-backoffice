<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="{{asset('backend/admin/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/ionicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/datepicker3.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/all.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/select2.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/dataTables.bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/AdminLTE.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/css/_all-skins.min.css')}}">
      <link rel="stylesheet" href="{{asset('backend/admin/style.css')}}">
   </head>
   <body class="hold-transition login-page sidebar-mini">
      <div class="login-box">
            <div class="login-logo">
                <b>Panneau d'administrateur</b>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Connectez-vous à l'application</p>
                @if (Session::has("error"))
                    <section class="content" style="min-height:auto;margin-bottom: -30px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-danger">
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
            <form action=" {{ url('admin/connect', []) }} " method="post">
                @csrf			
               <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Email address" name="email" type="email" required>
               </div>
               <div class="form-group has-feedback">
                  <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="" required>
               </div>
               <div class="row">
                  <div class="col-xs-8"></div>
                  <div class="col-xs-4">
                     <input type="submit" class="btn btn-success btn-block btn-flat login-button" name="form1" value="Connexion">
                  </div>
               </div>
            </form>
         </div>
      </div>
      <script src="{{asset('backend/admin/js/jquery-2.2.3.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/dataTables.bootstrap.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/select2.full.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.inputmask.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.inputmask.date.extensions.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.inputmask.extensions.js')}}"></script>
      <script src="{{asset('backend/admin/js/moment.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/bootstrap-datepicker.js')}}"></script>
      <script src="{{asset('backend/admin/js/icheck.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/fastclick.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.sparkline.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/jquery.slimscroll.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/app.min.js')}}"></script>
      <script src="{{asset('backend/admin/js/demo.js')}}"></script>
   </body>
</html>