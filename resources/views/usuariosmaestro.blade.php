@extends('layout')
@section('header')
<header class="page-header">
    <h2>Maestro de usuarios</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Usuarios</span></li>
            <li><span>Maestro de usuarios</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

@stop
@section('content')
<!-- Creación -->
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<!--<a href="#" class="fa fa-times"></a>-->
				</div>
				<h2 class="panel-title">Creación de usuarios</h2>
			</header>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group mb-lg">
							<label>Nombre Completo</label>
							<input name="f011_nombre" type="text" class="form-control input-lg" value="{{old('f011_nombre')}}"/>
						</div>
						@foreach ($errors->get('f011_nombre') as $message)
							<p class="error">* {{ $message }}</p>
						@endforeach
					</div>
					<div class="col-sm-6">
						<div class="form-group mb-lg">
							<label>Tipo de documento</label>
							<select class="form-control mb-lg" name="f011_tipo_documento" value="{{old('f011_tipo_documento')}}">
								<option value="CC">CC</option>
								<option value="TI">TI</option>
								<option value="NIT">NIT</option>
								<option value="CE">CE</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group mb-lg">
							<label>E-mail</label>
							<input name="email" type="email" class="form-control input-lg" value="{{old('email')}}"/>
						</div>
						@foreach ($errors->get('email') as $message)
							<p class="error">* {{ $message }}</p>
						@endforeach
					</div>
					<div class="col-sm-6">
						<div class="form-group mb-lg">
							<label>No. Documento</label>
							<input name="f011_documento" type="text" class="form-control input-lg" value="{{old('f011_documento')}}"/>
						</div>
						@foreach ($errors->get('f011_documento') as $message)
							<p class="error">* {{ $message }}</p>
						@endforeach
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Contraseña</label>
						<input name="password" type="password" class="form-control input-lg" />
					</div>
					<div class="col-sm-6">
						<label>Repetir Contraseña</label>
						<input name="password_confirmation" type="password" class="form-control input-lg" />
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Rol</label>
						<div class="input-group mb-md">
							<div class="input-group-btn">
								<button tabindex="-1" class="btn btn-primary" type="button">Action</button>
								<button tabindex="-1" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
									<span class="caret"></span>
								</button>
							</div>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
			<footer class="panel-footer">
				<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-check"></i> Adicionar</button>
				<button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-check"></i> Modificar</button>
				<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-check"></i> Eliminar</button>
			</footer>
		</section>
	</div>
</div>

@stop