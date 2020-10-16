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
              <li class="breadcrumb-item active">Add Casagri de Lara</li>
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
      	<form name="categoryForm" id="categoryForm" action="{{ url('admin/add-edit-casagriL') }}" method="post" enctype="multipart/Form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Agregar Inventario</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              	<div class="form-group">
                    <label for="category_name">Nombre Estación</label>
                    <input type="text" class="form-control" id="Estación_name" name="Estación_name" placeholder="Nombre Estación">
             	</div>
              <div class="form-group">
                    <label for="category_name">Direccion IP</label>
                    <input type="text" class="form-control" id="Estación_name" name="Estación_name" placeholder="Nombre Estación">
              </div>
              <div class="form-group">
                    <label for="category_name">Departamento</label>
                    <input type="text" class="form-control" id="Estación_name" name="Estación_name" placeholder="Nombre Estación">
              </div>
              <div class="form-group">
                    <label for="category_name">Usuario</label>
                    <input type="text" class="form-control" id="Estación_name" name="Estación_name" placeholder="Nombre Estación">
              </div>
              <div class="form-group">
                    <label for="category_name">Observacion</label>
                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Seleccionar Monitor</label>
                  <select name="section_id" id="section_ids" class="form-control select2" style="width: 100%;">
                    <option value="">Seleccionar</option>
                    @foreach($getmonitor as $monitors)
                    <option value="{{$monitors->id}}">{{ $monitors->monitor_marca . "   Modelo    " . $monitors->monitor_modelo . "   Serial   " . $monitors->monitor_serial }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                   <label>Seleccionar Disco duro</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Seleccionar</option>
                   </select>
                </div>
                 <div class="form-group">
                   <label>Seleccionar Tarjeta Madre</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Seleccionar</option>
                   </select>
                </div>
                 <div class="form-group">
                   <label>Seleccionar Memoria Ram</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Seleccionar</option>
                   </select>
                </div>
                 <div class="form-group">
                   <label>Seleccionar Sistema Operativo</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Seleccionar</option>
                   </select>
                </div>
                 <div class="form-group">
                   <label>Seleccionar Procesador</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Seleccionar</option>
                   </select>
                </div>
                <!-- /.form-group -->
              </div>
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