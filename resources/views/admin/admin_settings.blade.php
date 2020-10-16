 @extends('layouts.admin_layout.admin_layout')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Configuración</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Configuración</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header"style="background:green;">
                <h3 class="card-title">Actualizar Contraseña</h3>
              </div>
              <!-- /.card-header -->

                  @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                       {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  @endif

                  @if(Session::has('success_message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                       {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  @endif

              <!-- form start -->
              <form role="form" method="post" action="{{ url('/admin/update-current-pwd') }}" name="updatePasswordForm" id="updatePasswordForm">@csrf
                <div class="card-body">

                 <?php /*<div class="form-group">
                    <label for="exampleInputEmail1">Nombre del administrador</label>
                    <input class="form-control" value="{{ $admindetails->name }}" name="admin_name" id="admin_name">
                  </div>*/ ?>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <input class="form-control" value="{{ $admindetails->email }}" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tipo de administrador</label>
                    <input class="form-control" value="{{ $admindetails->type }}" readonly="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña actual</label>
                    <input type="password" class="form-control" id="current_pwd" name="current_pwd" placeholder="Ingrese Contraseña Actual">
                    <span id="chkCurrentpwd"></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña nueva</label>
                    <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Ingrese Contraseña nueva" required="">
                    <div>
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style= "margin-left: 450px;"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Confirmar Contraseña" required="">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background:green;">Actualizar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  @endsection