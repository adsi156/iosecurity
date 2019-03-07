@extends('layout')

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
@stop