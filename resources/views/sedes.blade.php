@extends('layout')
@section('header')
<header class="page-header">
    <h2>Horarios</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Pages</span></li>
            <li><span>Horarios</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>

				<h2 class="panel-title">Maestro de Sedes</h2>
			</header>
			<div class="panel-body">
				<comp-sedes></comp-sedes>
			</div>
		</section>
	</div>
</div>
@stop