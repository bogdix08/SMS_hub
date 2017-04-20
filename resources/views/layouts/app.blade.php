<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SMS Hub') }}</title>

    <!-- Styles -->
    <link href="../../../public/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="../../../public/css/footer-distributed.css">
	<link href="../../../public/css/jquery-ui.css" rel="stylesheet">
	

		<script src="<?= asset('../../../public/app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('../../../public/js/jquery.min.js') ?>"></script>
		<script src="<?= asset('../../../public/js/jquery-ui.js') ?>"></script>
        <script src="<?= asset('../../../public/js/bootstrap.min.js') ?>"></script>
        <script src="<?= asset('../../../public/js/jquery.timepicker.min.js') ?>"></script>
		<script src="<?= asset('../../../public/js/dataTables.bootstrap.min.js') ?>"></script>
		<script src="<?= asset('../../../public/js/jquery.dataTables.min.js') ?>"></script>
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('../../../public/app/app.js') ?>"></script>
        <script src="<?= asset('../../../public/app/controllers/form.js') ?>"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'SMS Hub') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
							<li>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login</a>
										<ul class="dropdown-menu"  role="menu">
											<li>
												<a href="{{ url('/login') }}">Login as User</a>
											</li>
											<li>
												<a href="{{ url('/seed_login') }}">Login as Seeder</a>
											</li>
										</ul>
								</div>
							</li>
                            <li>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register</a>
										<ul class="dropdown-menu"  role="menu">
											<li>
												<a href="{{ url('/register') }}">Register as User</a>
											</li>
											<li>
												<a href="{{ url('/seed_register') }}">Register as Seeder</a>
											</li>
										</ul>
								</div>
							</li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
									<li>
										<a href="{{ url('/sms') }}">
                                            SMS
                                        </a>
									</li>
</li>
                                                                        <li>
										<a href="{{ url('/contacts') }}">
                                            Contacts
                                        </a>
									</li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    
	@yield('content')
    <footer class="footer-distributed">
<!--
			<div class="footer-right">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>

			</div>
-->
			<div class="footer-left">

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">SMS</a>
					·
					<a href="#">Contact</a>
				</p>

				<p>SMS Hub &copy; 2017</p>
			</div>

		</footer>
		</div>
</body>
</html>
