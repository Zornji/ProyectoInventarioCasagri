@extends('layouts.admin_layout.admin_layout')
@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Componentes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Monitor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                      {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Monitor</h3>
                <a href="{{ url('admin/add-edit-monitor') }}" class="btn btn-block btn-success" style="max-width: 150px; float: right; display: inline-block;" >Agregar Nuevo</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serial</th>
                    <th>Estatus</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($monitor as $monitors)
                  <tr>
                    <td>{{ $monitors->id }}</td>
                    <td>{{ $monitors->monitor_marca }}</td>
                    <td>{{ $monitors->monitor_modelo }}</td>
                    <td>{{ $monitors->monitor_serial }}</td>
                    <td>
                      @if($monitors->status==1)
                         <a class="updateMonitorStatus" id="monitor-{{ $monitors->id }}" monitor_id="{{ $monitors->id }}" href="javascript:void(0)">Activo</a>
                      @else
                        <a class="updateMonitorStatus" id="monitor-{{ $monitors->id }}" monitor_id="{{ $monitors->id }}" href="javascript:void(0)">Inactivo</a>
                      @endif
                    </td>


                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection