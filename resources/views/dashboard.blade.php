@extends('layout')
@section('header')
@csrf
<header class="page-header">
    <h2>Panel de control</h2>
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
    <div class="col-md-6">
        <div class="tabs">
            <ul class="nav nav-tabs nav-justified">
                <li class="active">
                    <a href="#popular10" data-toggle="tab" class="text-center"><i class="fa fa-star"></i> Popular</a>
                </li>
                <li>
                    <a href="#recent10" data-toggle="tab" class="text-center">Recent</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="popular10" class="tab-pane active">
                    <p>Popular <code>.nav-tabs.nav-justified</code></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                </div>
                <div id="recent10" class="tab-pane">
                    <p>Recent <code>.nav-tabs.nav-justified</code></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    alert("aaaaaaaaaaaaaaa");
</script>
@stop