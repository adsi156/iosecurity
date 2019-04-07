@extends('layout')
@section('header')
<header class="page-header">
    <h2>Configuración de Componentes</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Menu</span></li>
            <li><span>Componentes</span></li>
            <li><span>Configuración de Componentes</span></li>
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
				<h2 class="panel-title">Configuración de Componentes</h2>
			</header>
			<div class="panel-body">
				<configcomponentes-maestro></configcomponentes-maestro>
			</div>
		</section>
	</div>
</div>
@stop