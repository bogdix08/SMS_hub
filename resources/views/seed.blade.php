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
	<link href="../../../public/css/seed.css" rel="stylesheet">
	<link rel="stylesheet" href="../../../public/css/footer-distributed.css">

		<script src="<?= asset('../../../public/app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('../../../public/js/jquery.min.js') ?>"></script>
        <script src="<?= asset('../../../public/js/bootstrap.min.js') ?>"></script>
		<script src="<?= asset('../../../public/js/highcharts.js') ?>"></script>
		<script src="<?= asset('../../../public/js/exporting.js') ?>"></script>
		<script src="<?= asset('../../../public/js/data.js') ?>"></script>
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
<body  onresize="resizeChart()">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                        @if (!session('seed'))
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
                                    {{ session('seed')->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/seed_logout') }}">Logout</a>
                                    </li>
									<li>
                                        <a href="{{ url('/seed') }}">Statistics</a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
	<div class="container">
		<table id="datatable" hidden>
			<thead>
				<th>Day</th>
				<th>SMSs</th>
			</thead>
			<tbody>
			@foreach($Days as $day)
				<tr>
					<td>
					{{$day->date}}
					</td>
					<td>
					{{$day->sms}}
					</td>
				</tr>
			@endforeach
			<tr>
					<td>
					18 Mar 2017
					</td>
					<td>
					0
					</td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="container" id="content">
	<div id="container" class="container"></div>
	<script type="text/javascript">

		var chart = Highcharts.chart('container', {
			data: {
				table: 'datatable'
			},
			chart: {
				type: 'column',
				backgroundColor: {
						linearGradient: [500, 500, 0, 0],
						stops: [
							[0, 'rgb(255, 255, 255)'],
							[1, 'rgb(240, 240, 255)']
							]
					},
				width:window.innerWidth/2.3,
					
			},
			title: {
				text: 'Statistics',
				verticalAllign:'top',
				y: 25
			},
			xAxis:{
				type: 'datetime',
				startOnTick:true,
				tickInterval:5 * 24 * 3600 * 1000,
			},
			yAxis: {
				allowDecimals: false,
				title: {
					text: ''
				}
			},
			series: [{
				maxPointWidth: 20
			}]
		});

		function resizeChart(){
			chart.setSize(window.innerWidth/2.3,null);
		}
	</script>
		<div id="details" class="container">
			<h3 class="details-title"> Account details </h3>
			<div id="details-content">
			<p> Username: {{session('seed')->username}}</p>
			<p> E-mail: {{session('seed')->email}}</p>
			<p> Total SMS sent: {{session('seed')->nr_sms_sent}}</p>
			<p> Member since: {{date('j F Y',strtotime(session('seed')->created_at))}}</p>
			</div>
		</div>
	</div>	
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
</body>
</html>
