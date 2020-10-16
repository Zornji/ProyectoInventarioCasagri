@extends('layouts.admin_layout.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Monitor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	 @if ($errors->any())
	        <div class="alert alert-danger" style="margin-top: 10px;">
	           <ul>
	               @foreach ($errors->all() as $error)
	                  <li>{{ $error }}</li>
	                @endforeach
	           </ul>
	        </div>
          @endif
      	<form name="monitorForm" id="monitorForm" action="{{ url('admin/add-edit-monitor') }}" method="post" enctype="multipart/Form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Agregar Monitor</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              	<div class="form-group">
                    <label for="category_name">Marca</label>
                    <input type="text" class="form-control" id="monitor_marca" name="monitor_marca" placeholder="Marca">
             	</div>
              <div class="form-group">
                    <label for="category_name">Modelo</label>
                    <input type="text" class="form-control" id="monitor_modelo" name="monitor_modelo" placeholder="Modelo">
              </div>
              <div class="form-group">
                    <label for="category_name">Serial</label>
                    <input type="text" class="form-control" id="monitor_serial" name="monitor_serial" placeholder="Serial">
              </div>
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
     			<button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
        </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection