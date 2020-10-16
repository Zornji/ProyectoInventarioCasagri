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
              <li class="breadcrumb-item active">Casagri de Lara</li>
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
      	<form name="categoryForm" id="categoryForm" action="{{ url('admin/add-edit-category') }}" method="post" enctype="multipart/Form-data">@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Agregar ---</h3>
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
                   <label>Seleccionar Nivel Categoria</label>
                   <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                    <option value="0">Categoria principal</option>
                   </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Seleccionar Seccion</label>
                  <select name="section_id" id="section_ids" class="form-control select2" style="width: 100%;">
                    <option value="">Seleccionar</option>
                    @foreach($getSections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
				<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="category_image" name="category_image">
                        <label class="custom-file-label" for="category_image">Imagen Categoria</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
              	<div class="form-group">
                    <label for="category_name">Descuento de Categoría</label>
                    <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Nombre Categoria">
             	</div>
              	<div class="form-group">
                    <label for="category_name">Descripcion de la Categoría</label>
                     <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
             	</div>
              </div>
              <div class="col-12 col-sm-6">
              	<div class="form-group">
                    <label for="category_name">Categoría URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Nombre Categoria">
             	</div>
              	<div class="form-group">
                    <label for="category_name">Meta Title</label>
                    <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ..."></textarea>
             	</div>
              </div>
              <div class="col-12 col-sm-6">
              	<div class="form-group">
                    <label for="category_name">Meta Descripcion</label>
                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
             	</div>
             	</div>
             	<div class="col-12 col-sm-6">
              	<div class="form-group">
                    <label for="category_name">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" placeholder="Enter ..."></textarea>
             	</div>
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