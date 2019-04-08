@extends('layout')
@section('header')
@csrf
<header class="page-header">
    <h2>Bienvenido a IOSecurity</h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Inicio</span></li>
            <li><span>IOSecurity</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>
@stop
@section('content')
<body class="fondo">
<div class="row">
    <div class="col-md-6">
        <div class="tabs">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> Popular</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="popular10" class="tab-pane active">
                    <div class="block">
                        <el-timeline>
                            <el-timeline-item timestamp="Industria Embebida Hoy, Lunes 18/04/2019" placement="top">
                            <el-card>
                                <h4><B>Arquitectura de analítica y monitorización embebida</B></h4>
                                <p align="justify">La británica UltraSoC ha anunciado la expansión de su arquitectura de analítica embebida, permitiendo a los diseñadores la incorporación de funcionalidades dirigidas por los datos en sus productos. Dicha arquitectura se dirige a los sectores de las industrias de la automoción, el almacenamiento, y la computación de alto rendimiento. </p>
                            </el-card>
                            </el-timeline-item>
                            <el-timeline-item timestamp="El Tiempo, Medellin, Lunes 18/04/2019" placement="top">
                            <el-card>
                                <h4><B>Firman convenios para construir la Universidad Digital de Antioquia</B></h4>
                                <p align="justify">La que será la primera institución educativa pública 100 por ciento digital del país, y uno de los llamados proyectos detonantes de la actual gobernación, sigue tomando forma para consolidarse.</p>
                            </el-card>
                            </el-timeline-item>
                            <el-timeline-item timestamp="El País, Marzo 29/04/2019" placement="top">
                            <el-card>
                                <h4><B>La empresa caleña de software Open Systems llegó a competir a EE.UU.</B></h4>
                                <p align="justify">La pequeña ciudad de Fort Collins, Colorado, famosa por contar con uno de los pocos relojes atómicos que existen en el mundo, tiene desde el año pasado una conexión especial con Cali.</p>
                            </el-card>
                            </el-timeline-item>
                        </el-timeline>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@stop