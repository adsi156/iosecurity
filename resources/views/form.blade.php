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
<!-- start: page -->
<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
	<div class="content-with-menu-container">
		<div class="inner-menu-toggle">
			<a href="#" class="inner-menu-expand" data-open="inner-menu">
				Show Bar <i class="fa fa-chevron-right"></i>
			</a>
		</div>
		
		<menu id="content-menu" class="inner-menu" role="menu">
			<div class="nano">
				<div class="nano-content">
		
					<div class="inner-menu-toggle-inside">
						<a href="#" class="inner-menu-collapse">
							<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Bar
						</a>
						<a href="#" class="inner-menu-expand" data-open="inner-menu">
							Show Bar <i class="fa fa-chevron-down"></i>
						</a>
					</div>
		
					<div class="inner-menu-content">
		
						<a class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
							<i class="fa fa-upload mr-xs"></i>
							Upload Files
						</a>
		
						<hr class="separator" />
		
						<div class="sidebar-widget m-none">
							<div class="widget-header clearfix">
								<h6 class="title pull-left mt-xs">Folders</h6>
								<div class="pull-right">
									<a href="#" class="btn btn-dark btn-sm btn-widget-act">Add Folder</a>
								</div>
							</div>
							<div class="widget-content">
								<ul class="mg-folders">
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> My Documents</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> Templates</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> Design</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> PSDs</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> Downloads</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> Photos</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
									<li>
										<a href="#" class="menu-item"><i class="fa fa-folder"></i> Projects</a>
										<div class="item-options">
											<a href="#">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" class="text-danger">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
		
						<hr class="separator" />
		
						<div class="sidebar-widget m-none">
							<div class="widget-header">
								<h6 class="title">Labels</h6>
								<span class="widget-toggle">+</span>
							</div>
							<div class="widget-content">
								<ul class="mg-tags">
									<li><a href="#">Design</a></li>
									<li><a href="#">Projects</a></li>
									<li><a href="#">Photos</a></li>
									<li><a href="#">Websites</a></li>
									<li><a href="#">Documentation</a></li>
									<li><a href="#">Download</a></li>
									<li><a href="#">Images</a></li>
									<li><a href="#">Vacation</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</menu>
		<div class="inner-body mg-main">
		
			<div class="inner-toolbar clearfix">
				<ul>
					<li>
						<a href="#" id="mgSelectAll"><i class="fa fa-check-square"></i> <span data-all-text="Select All" data-none-text="Select None">Select All</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-pencil"></i> Edit</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-trash-o"></i> Delete</a>
					</li>
					<li class="right" data-sort-source data-sort-id="media-gallery">
						<ul class="nav nav-pills nav-pills-primary">
							<li>
								<label>Filter:</label>
							</li>
							<li class="active">
								<a data-option-value="*" href="#all">All</a>
							</li>
							<li>
								<a data-option-value=".document" href="#document">Documents</a>
							</li>
							<li>
								<a data-option-value=".image" href="#image">Images</a>
							</li>
							<li>
								<a data-option-value=".video" href="#video">Videos</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
				<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-1.jpg">
								<img src="assets/images/projects/project-1.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_1" value="1">
										<label for="file_1">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">SEO<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Design, Websites</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-2.jpg">
								<img src="assets/images/projects/project-2.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_2" value="1">
										<label for="file_2">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Blog<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">PSDs, Projects</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-5.jpg">
								<img src="assets/images/projects/project-5.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_3" value="1">
										<label for="file_3">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Friends<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Projects, Vacation</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-4.jpg">
								<img src="assets/images/projects/project-4.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_4" value="1">
										<label for="file_4">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Life<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Images, Photos</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-5.jpg">
								<img src="assets/images/projects/project-5.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_5" value="1">
										<label for="file_5">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Poetry<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Websites</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-6.jpg">
								<img src="assets/images/projects/project-6.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_6" value="1">
										<label for="file_6">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Fun<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Documentation, Projects</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-7.jpg">
								<img src="assets/images/projects/project-7.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_7" value="1">
										<label for="file_7">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Family<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Documentation</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
				<div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="thumb-preview">
							<a class="thumb-image" href="assets/images/projects/project-1.jpg">
								<img src="assets/images/projects/project-1.jpg" class="img-responsive" alt="Project">
							</a>
							<div class="mg-thumb-options">
								<div class="mg-zoom"><i class="fa fa-search"></i></div>
								<div class="mg-toolbar">
									<div class="mg-option checkbox-custom checkbox-inline">
										<input type="checkbox" id="file_8" value="1">
										<label for="file_8">SELECT</label>
									</div>
									<div class="mg-group pull-right">
										<a href="#">EDIT</a>
										<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
											<i class="fa fa-caret-up"></i>
										</button>
										<ul class="dropdown-menu mg-menu" role="menu">
											<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
											<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h5 class="mg-title text-semibold">Hapiness<small>.png</small></h5>
						<div class="mg-description">
							<small class="pull-left text-muted">Websites</small>
							<small class="pull-right text-muted">07/10/2014</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end: page -->
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

				<h2 class="panel-title">Form Elements</h2>
			</header>
			<div class="panel-body">
				<form class="form-horizontal form-bordered" method="get">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Default</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDisabled">Disabled</label>
						<div class="col-md-6">
							<input class="form-control" id="inputDisabled" type="text" placeholder="Disabled input here..." disabled="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputReadOnly">Read-Only Input</label>
						<div class="col-md-6">
							<input type="text" value="Read-Only Input" id="inputReadOnly" class="form-control" readonly="readonly">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputHelpText">Help text</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputHelpText">
							<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputRounded">Rounded Input</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-rounded" id="inputRounded">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputFocus">Input focus</label>
						<div class="col-md-6">
							<input class="form-control" id="inputFocus" type="text" value="This is focused...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputPlaceholder">Placeholder</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="placeholder" id="inputPlaceholder">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputPassword">Password</label>
						<div class="col-md-6">
							<input type="password" class="form-control" placeholder="" id="inputPassword">
						</div>
					</div>

					<div class="form-group">
						<label class=" col-md-3 control-label">Static control</label>
						<div class="col-lg-6">
							<p class="form-control-static">email@example.com</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Left Icon</label>
						<div class="col-md-6">
							<div class="input-group input-group-icon">
								<span class="input-group-addon">
									<span class="icon"><i class="fa fa-user"></i></span>
								</span>
								<input type="text" class="form-control" placeholder="Left icon">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Right Icon</label>
						<div class="col-md-6">
							<div class="input-group input-group-icon">
								<input type="text" class="form-control" placeholder="Right icon">
								<span class="input-group-addon">
									<span class="icon"><i class="fa fa-user"></i></span>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Search</label>
						<div class="col-md-6">
							<div class="input-group input-search">
								<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">File Upload</label>
						<div class="col-md-6">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" />
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Vertical Group</label>
						<div class="col-md-6">
							<section class="form-group-vertical">
								<input class="form-control" type="text" placeholder="Username">
								<input class="form-control" type="text" placeholder="Email">
								<input class="form-control last" type="password" placeholder="Password">
							</section>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Vertical Group w/ icon</label>
						<div class="col-md-6">
							<section class="form-group-vertical">
								<div class="input-group input-group-icon">
									<span class="input-group-addon">
										<span class="icon"><i class="fa fa-user"></i></span>
									</span>
									<input class="form-control" type="text" placeholder="Username">
								</div>
								<div class="input-group input-group-icon">
									<span class="input-group-addon">
										<span class="icon"><i class="fa fa-key"></i></span>
									</span>
									<input class="form-control" type="text" placeholder="Password">
								</div>
							</section>
						</div>
					</div>

					<div class="form-group has-success">
						<label class="col-md-3 control-label" for="inputSuccess">Input with success</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputSuccess">
						</div>
					</div>
					<div class="form-group has-warning">
						<label class="col-md-3 control-label" for="inputWarning">Input with warning</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputWarning">
						</div>
					</div>
					<div class="form-group has-error">
						<label class="col-md-3 control-label" for="inputError">Input with error</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputError">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputTooltip">Input with Tooltip</label>
						<div class="col-md-6">
							<input type="text" placeholder="Hover me" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here" id="inputTooltip">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="inputPopover">Input with Popover</label>
						<div class="col-md-6">
							<input type="text" placeholder="Click Here" class="form-control" data-toggle="popover" data-placement="top" data-original-title="The Title" data-content="Content goes here..." data-trigger="click" id="inputPopover">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Column sizing</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-2">
									<input type="text" class="form-control" placeholder=".col-sm-2">
								</div>
								<div class="visible-xs mb-md"></div>
								<div class="col-sm-3">
									<input type="text" class="form-control" placeholder=".col-sm-3">
								</div>
								<div class="visible-xs mb-md"></div>
								<div class="col-sm-4">
									<input type="text" class="form-control" placeholder=".col-sm-4">
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>
@stop