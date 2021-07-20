<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>{{ $titulo }}</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
	<meta name="author" content="JSOFT.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/rh-system-logo.png')}}">
	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

	<!-- Head Libs -->
	<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>

	@if ($tipo=="grafico")
	<script src="{{asset('highcharts/highcharts.js')}}"></script>
	<script src="{{asset('highcharts/modules/exporting.js')}}"></script>
	<script src="{{asset('highcharts/modules/export-data.js')}}"></script>
	<script src="{{asset('highcharts/modules/accessibility.js')}}"></script>
	@endif
</head>

<body>
	@if($tipo!="login")
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="/" class="logo">
					<img src="{{asset('assets/images/rh-system-logo.png')}}" height="35" alt="JSOFT Admin" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">

				<form action="pages-search-results.html" class="search nav-form">
					<div class="input-group input-search">
						<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>

				<span class="separator"></span>

				<ul class="notifications">
					<li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-tasks"></i>
							<span class="badge">3</span>
						</a>

						<div class="dropdown-menu notification-menu large">
							<div class="notification-title">
								<span class="pull-right label label-default">3</span>
								Tasks
							</div>

							<div class="content">
								<ul>
									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Generating Sales Report</span>
											<span class="message pull-right text-dark">60%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Importing Contacts</span>
											<span class="message pull-right text-dark">98%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Uploading something big</span>
											<span class="message pull-right text-dark">33%</span>
										</p>
										<div class="progress progress-xs light mb-xs">
											<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-envelope"></i>
							<span class="badge">4</span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="pull-right label label-default">230</span>
								Messages
							</div>

							<div class="content">
								<ul>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joseph Doe Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Doe</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joe Junior" class="img-circle" />
											</figure>
											<span class="title">Joe Junior</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
										</a>
									</li>
								</ul>

								<hr />

								<div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div>
							</div>
						</div>
					</li>
					<li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge">3</span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="pull-right label label-default">3</span>
								Alerts
							</div>

							<div class="content">
								<ul>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-thumbs-down bg-danger"></i>
											</div>
											<span class="title">Server is Down!</span>
											<span class="message">Just now</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-lock bg-warning"></i>
											</div>
											<span class="title">User Locked</span>
											<span class="message">15 minutes ago</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-signal bg-success"></i>
											</div>
											<span class="title">Connection Restaured</span>
											<span class="message">10/10/2014</span>
										</a>
									</li>
								</ul>

								<hr />

								<div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div>
							</div>
						</div>
					</li>
				</ul>

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="@if(Auth::user()->pessoa->foto == '') {{asset('assets/images/novo/profile.png')}} @else {{asset(Auth::user()->pessoa->foto)}} @endif" alt="{{Auth::user()->pessoa->nome}}" class="img-circle" data-lock-picture="@if(Auth::user()->pessoa->foto == '') {{asset('assets/images/novo/profile.png')}} @else {{asset(Auth::user()->pessoa->foto)}} @endif" />
						</figure>
						<div class="profile-info" data-lock-name="{{Auth::user()->pessoa->nome}}" data-lock-email="{{Auth::user()->email}}">
							<span class="name">{{Auth::user()->pessoa->nome}}</span>
							<span class="role">{{Auth::user()->acesso}}</span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="/usuarios/perfil"><i class="fa fa-user"></i> Meu Perfil</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Bloquear</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li class="@if($menu=='Home') nav-active @endif">
									<a href="/">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Home</span>
									</a>
								</li>
								<li class="@if($menu=='Usuários') nav-active @endif">
									<a href="/usuarios/list">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Usuários</span>
									</a>
								</li>

								<li class="@if($menu=='Funcionários') nav-active @endif">
									<a href="/funcionarios/list">
										<i class="fa fa-group" aria-hidden="true"></i>
										<span>Funcionários</span>
									</a>
								</li>

								<li class="@if($menu=='Salários') nav-active @endif">
									<a href="/salarios/list">
										<i class="fa fa-money" aria-hidden="true"></i>
										<span>Salários</span>
									</a>
								</li>

								<li class="@if($menu=='Departamentos') nav-active @endif">
									<a href="/departamentos/list">
										<i class="fa fa-tasks" aria-hidden="true"></i>
										<span>Departamentos</span>
									</a>
								</li>

								<li class="@if($menu=='Clientes') nav-active @endif">
									<a href="/clientes/list">
										<i class="fa fa-users" aria-hidden="true"></i>
										<span>Clientes</span>
									</a>
								</li>

								<li class="@if($menu=='Candidaturas') nav-active @endif">
									<a href="/candidaturas/list">
										<i class="fa fa-briefcase" aria-hidden="true"></i>
										<span>Candidaturas</span>
									</a>
								</li>

								<li class="@if($titulo == 'Balanços') nav-parent nav-expanded nav-active @else nav-parent @endif">
									<a>
										<i class="fa fa-table" aria-hidden="true"></i>
										<span>Balanços</span>
									</a>
									<ul class="nav nav-children">
										<li class="@if($menu == 'B. Salários') nav-active @endif">
											<a href="/balancos/salarios">
												Salários
											</a>
										</li>
										<li>
											<a href="tables-basic.html">
												Faltas
											</a>
										</li>
									</ul>
								</li>

								<li class="@if($titulo == 'Extras') nav-parent nav-expanded nav-active @else nav-parent @endif">
									<a>
										<i class="fa fa-copy" aria-hidden="true"></i>
										<span>Extras</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="pages-signup.html">
												Faltas
											</a>
										</li>
										<li>
											<a href="pages-signin.html">
												Subcídios
											</a>
										</li>
										<li>
											<a href="pages-recover-password.html">
												Documentação
											</a>
										</li>
										<li>
											<a href="pages-lock-screen.html">
												Cargos
											</a>
										</li>
										<li class="@if($menu == 'Bancos') nav-active @endif">
											<a href="/bancos/list">
												Bancos
											</a>
										</li>

									</ul>
								</li>
								<li class="@if($titulo == 'Configuraçoes') nav-parent nav-expanded nav-active @else nav-parent @endif">
									<a>
										<i class="fa fa-cogs" aria-hidden="true"></i>
										<span>Configurações</span>
									</a>
									<ul class="nav nav-children">
										<li class="@if($menu == 'Empresa') nav-active @endif">
											<a href="/empresa/list">
												Empresa
											</a>
										</li>

										<li class="@if($menu == 'Contas') nav-active @endif">
											<a href="/contas/list">
												Contas
											</a>
										</li>

									</ul>
								</li>
								<li>
									<a href="http://themeforest.net/item/JSOFT-responsive-html5-template/4106987?ref=JSOFT" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i>
										<span>Pagina-Rosto <em class="not-included">(Não Incluído)</em></span>
									</a>
								</li>
							</ul>
						</nav>

						<hr class="separator" />

						<div class="sidebar-widget widget-tasks">
							<div class="widget-header">
								<h6>Projectos</h6>
								<div class="widget-toggle">+</div>
							</div>
							<div class="widget-content">
								<ul class="list-unstyled m-none">
									<li><a href="#">RH SYSTEM</a></li>
									<li><a href="#">CIFRAngola</a></li>
									<li><a href="#">D'ANGO GESTUS</a></li>
								</ul>
							</div>
						</div>

						<hr class="separator" />

						<div class="sidebar-widget widget-stats">
							<div class="widget-header">
								<h6>Empresas Stats</h6>
								<div class="widget-toggle">+</div>
							</div>
							<div class="widget-content">
								<ul>
									<li>
										<span class="stats-title">Stat 1</span>
										<span class="stats-complete">85%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
												<span class="sr-only">85% Completo</span>
											</div>
										</div>
									</li>
									<li>
										<span class="stats-title">Stat 2</span>
										<span class="stats-complete">70%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
												<span class="sr-only">70% Completo</span>
											</div>
										</div>
									</li>
									<li>
										<span class="stats-title">Stat 3</span>
										<span class="stats-complete">2%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
												<span class="sr-only">2% Completo</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>

			</aside>
			<!-- end: sidebar -->
			@yield('content')

		</div>

		<aside id="sidebar-right" class="sidebar-right">
			<div class="nano">
				<div class="nano-content">
					<a href="#" class="mobile-close visible-xs">
						Collapse <i class="fa fa-chevron-right"></i>
					</a>

					<div class="sidebar-right-wrapper">

						<div class="sidebar-widget widget-calendar">
							<h6>Tarefas Marcadas</h6>
							<div data-plugin-datepicker data-plugin-skin="dark"></div>

							<ul>
								<li>
									<time datetime="{{date('Y-m-d')}}T{{date('H:i')}}">{{date('d/m/Y')}}</time>
									<span>Reunião Empresa</span>
								</li>
							</ul>
						</div>

						<div class="sidebar-widget widget-friends">
							<h6>Usuários</h6>
							<ul>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>

								<li class="status-offline">
									<figure class="profile-picture">
										<img src="{{asset('assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</aside>
	</section>
	@else
	@yield('content')
	@endif
	<!-- Vendor -->

	<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

	<!-- Specific Page Vendor -->
	<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
	<script src="{{asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
	<script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('assets/vendor/flot/jquery.flot.categories.js')}}"></script>
	<script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
	<script src="{{asset('assets/vendor/raphael/raphael.js')}}"></script>
	<script src="{{asset('assets/vendor/morris/morris.js')}}"></script>
	<script src="{{asset('assets/vendor/gauge/gauge.js')}}"></script>
	<script src="{{asset('assets/vendor/snap-svg/snap.svg.js')}}"></script>
	<script src="{{asset('assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
	<script src="{{asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="{{asset('assets/javascripts/theme.js')}}"></script>

	<!-- Theme Custom -->
	<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>

	<!-- Theme Initialization Files -->
	<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>


	<!-- Examples -->
	<script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script>

</body>

</html>
