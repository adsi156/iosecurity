<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/font-awesome/css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ url('assets/stylesheets/theme-custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ url('assets/vendor/modernizr/modernizr.js') }}"></script>
		<style>
			.error{
				color:red;
				font-style: italic;
			}
		</style>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ url('assets/images/logo.png') }}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form action="{{ url('usuarios') }}" method="post">

							@csrf

							<div class="form-group mb-lg">
								<label>Nombre Completo</label>
								<input name="f011_nombre" type="text" class="form-control input-lg" value="{{old('f011_nombre')}}"/>
							</div>
							@foreach ($errors->get('f011_nombre') as $message)
								<p class="error">* {{ $message }}</p>
							@endforeach
							<div class="form-group mb-lg">
								<label>Tipo de documento</label>
								<select class="form-control mb-md" name="f011_tipo_documento" value="{{old('f011_tipo_documento')}}">
									<option value="CC">CC</option>
									<option value="TI">TI</option>
									<option value="NIT">NIT</option>
									<option value="CE">CE</option>
								</select>
							</div>

							<div class="form-group mb-lg">
								<label>No. Documento</label>
								<input name="f011_documento" type="text" class="form-control input-lg" value="{{old('f011_documento')}}"/>
							</div>
							@foreach ($errors->get('f011_documento') as $message)
								<p class="error">* {{ $message }}</p>
							@endforeach

							<div class="form-group mb-lg">
								<label>E-mail</label>
								<input name="email" type="email" class="form-control input-lg" value="{{old('email')}}"/>
							</div>
							@foreach ($errors->get('email') as $message)
								<p class="error">* {{ $message }}</p>
							@endforeach

							<label class="control-label">Foto</label>
							<div class="form-group mb-lg">
								<div class="col-md-12">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<i class="fa fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Change</span>
												<span class="fileupload-new">Select file</span>
												<input type="file" name="f011_imagen" value="{{old('f011_imagen')}}"/>
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Contraseña</label>
										<input name="password" type="password" class="form-control input-lg" />
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Repetir Contraseña</label>
										<input name="password_confirmation" type="password" class="form-control input-lg" />
									</div>
								</div>
								@foreach ($errors->get('password') as $message)
									<p class="error">* {{ $message }}</p>
								@endforeach
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div>

							<p class="text-center">Already have an account? <a href="{{ url('login') }}">Sign In!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{ url('assets/vendor/jquery/jquery.js') }}"></script>
		<script src="{{ url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ url('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ url('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
		<script src="{{ url('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{ url('assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
		<script src="{{ url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ url('assets/javascripts/theme.js') }}"></script>
		
		<!-- Theme Custom -->
		<script src="{{ url('assets/javascripts/theme.custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ url('assets/javascripts/theme.init.js') }}"></script>

	</body>
</html>