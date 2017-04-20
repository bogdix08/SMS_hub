@extends('layouts.app')		
<title>SMS Hub</title>
<link href="../../../public/css/sms.css" rel="stylesheet">
<link href="../../../public/css/jquery.timepicker.css" rel="stylesheet">
<link href="../../../public/css/base.css" rel="stylesheet">
<link href="../../../public/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../../public/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
	<div class="container input_container" ng-controller="myCtrl" ng-init='showme=false;Countries = [ [ "Afghanistan ", "93" ], [ "Albania ", "355" ], [ "Algeria ", "213" ], [ "American Samoa", "1684" ], [ "Andorra", "376" ], [ "Angola", "244" ], [ "Anguilla", "1264" ], [ "Antigua and Barbuda", "1268" ], [ "Argentina", "54" ], [ "Armenia ", "374" ], [ "Aruba", "297" ], [ "Australia", "61" ], [ "Austria ", "43" ], [ "Azerbaijan ", "994" ], [ "Bahamas", "1242" ], [ "Bahrain ", "973" ], [ "Bangladesh ", "880" ], [ "Barbados", "1246" ], [ "Belarus ", "375" ], [ "Belgium ", "32" ], [ "Belize", "501" ], [ "Benin ", "229" ], [ "Bermuda", "1441" ], [ "Bhutan ", "975" ], [ "Bolivia", "591" ], [ "Bosnia and Herzegovina", "387" ], [ "Botswana", "267" ], [ "Brazil ", "55" ], [ "British Indian Ocean Territory", "246" ], [ "British Virgin Islands", "1284" ], [ "Brunei", "673" ], [ "Bulgaria ", "359" ], [ "Burkina Faso", "226" ], [ "Burundi ", "257" ], [ "Cambodia ", "855" ], [ "Cameroon ", "237" ], [ "Canada", "1" ], [ "Cape Verde", "238" ], [ "Caribbean Netherlands", "599" ], [ "Cayman Islands", "1345" ], [ "Central African Republic", "236" ], [ "Chad ", "235" ], [ "Chile", "56" ], [ "China ", "86" ], [ "Christmas Island", "61" ], [ "Cocos  Islands", "61" ], [ "Colombia", "57" ], [ "Comoros ", "269" ], [ "Congo ", "243" ], [ "Congo ", "242" ], [ "Cook Islands", "682" ], [ "Costa Rica", "506" ], [ "Côte d’Ivoire", "225" ], [ "Croatia ", "385" ], [ "Cuba", "53" ], [ "Curaçao", "599" ], [ "Cyprus ", "357" ], [ "Czech Republic", "420" ], [ "Denmark ", "45" ], [ "Djibouti", "253" ], [ "Dominica", "1767" ], [ "Dominican Republic", "1" ], [ "Ecuador", "593" ], [ "Egypt ", "20" ], [ "El Salvador", "503" ], [ "Equatorial Guinea", "240" ], [ "Eritrea", "291" ], [ "Estonia ", "372" ], [ "Ethiopia", "251" ], [ "Falkland Islands", "500" ], [ "Faroe Islands", "298" ], [ "Fiji", "679" ], [ "Finland ", "358" ], [ "France", "33" ], [ "French Guiana", "594" ], [ "French Polynesia", "689" ], [ "Gabon", "241" ], [ "Gambia", "220" ], [ "Georgia ", "995" ], [ "Germany ", "49" ], [ "Ghana ", "233" ], [ "Gibraltar", "350" ], [ "Greece ", "30" ], [ "Greenland ", "299" ], [ "Grenada", "1473" ], [ "Guadeloupe", "590" ], [ "Guam", "1671" ], [ "Guatemala", "502" ], [ "Guernsey", "44" ], [ "Guinea ", "224" ], [ "Guinea-Bissau", "245" ], [ "Guyana", "592" ], [ "Haiti", "509" ], [ "Honduras", "504" ], [ "Hong Kong", "852" ], [ "Hungary ", "36" ], [ "Iceland ", "354" ], [ "India ", "91" ], [ "Indonesia", "62" ], [ "Iran ", "98" ], [ "Iraq ", "964" ], [ "Ireland", "353" ], [ "Isle of Man", "44" ], [ "Israel ", "972" ], [ "Italy ", "39" ], [ "Jamaica", "1876" ], [ "Japan ", "81" ], [ "Jersey", "44" ], [ "Jordan ", "962" ], [ "Kazakhstan ", "7" ], [ "Kenya", "254" ], [ "Kiribati", "686" ], [ "Kosovo", "383" ], [ "Kuwait ", "965" ], [ "Kyrgyzstan ", "996" ], [ "Laos ", "856" ], [ "Latvia ", "371" ], [ "Lebanon ", "961" ], [ "Lesotho", "266" ], [ "Liberia", "231" ], [ "Libya ", "218" ], [ "Liechtenstein", "423" ], [ "Lithuania ", "370" ], [ "Luxembourg", "352" ], [ "Macau ", "853" ], [ "Macedonia ", "389" ], [ "Madagascar ", "261" ], [ "Malawi", "265" ], [ "Malaysia", "60" ], [ "Maldives", "960" ], [ "Mali", "223" ], [ "Malta", "356" ], [ "Marshall Islands", "692" ], [ "Martinique", "596" ], [ "Mauritania ", "222" ], [ "Mauritius ", "230" ], [ "Mayotte", "262" ], [ "Mexico ", "52" ], [ "Micronesia", "691" ], [ "Moldova ", "373" ], [ "Monaco", "377" ], [ "Mongolia ", "976" ], [ "Montenegro ", "382" ], [ "Montserrat", "1664" ], [ "Morocco ", "212" ], [ "Mozambique ", "258" ], [ "Myanmar ", "95" ], [ "Namibia ", "264" ], [ "Nauru", "674" ], [ "Nepal ", "977" ], [ "Netherlands ", "31" ], [ "New Caledonia", "687" ], [ "New Zealand", "64" ], [ "Nicaragua", "505" ], [ "Niger ", "227" ], [ "Nigeria", "234" ], [ "Niue", "683" ], [ "Norfolk Island", "672" ], [ "North Korea", "850" ], [ "Northern Mariana Islands", "1670" ], [ "Norway ", "47" ], [ "Oman ", "968" ], [ "Pakistan ", "92" ], [ "Palau", "680" ], [ "Palestine ", "970" ], [ "Panama ", "507" ], [ "Papua New Guinea", "675" ], [ "Paraguay", "595" ], [ "Peru ", "51" ], [ "Philippines", "63" ], [ "Poland ", "48" ], [ "Portugal", "351" ], [ "Puerto Rico", "1" ], [ "Qatar ", "974" ], [ "Réunion", "262" ], [ "Romania ", "40" ], [ "Russia ", "7" ], [ "Rwanda", "250" ], [ "Saint Barthélemy", "590", ], [ "Saint Helena", "290" ], [ "Saint Kitts and Nevis", "1869" ], [ "Saint Lucia", "1758" ], [ "Saint Martin", "590" ], [ "Saint Pierre and Miquelon", "508" ], [ "Samoa", "685" ], [ "San Marino", "378" ], [ "São Tomé and Príncipe", "239" ], [ "Saudi Arabia", "966" ], [ "Senegal ", "221" ], [ "Serbia ", "381" ], [ "Seychelles", "248" ], [ "Sierra Leone", "232" ], [ "Singapore", "65" ], [ "Sint Maarten", "1721" ], [ "Slovakia ", "421" ], [ "Slovenia ", "386" ], [ "Solomon Islands", "677" ], [ "Somalia ", "252" ], [ "South Africa", "27" ], [ "South Korea", "82" ], [ "South Sudan", "211" ], [ "Spain ", "34" ], [ "Sri Lanka", "94" ], [ "Sudan ", "249" ], [ "Suriname", "597" ], [ "Svalbard and Jan Mayen", "47" ], [ "Swaziland", "268" ], [ "Sweden ", "46" ], [ "Switzerland ", "41" ], [ "Syria ", "963" ], [ "Taiwan ", "886" ], [ "Tajikistan", "992" ], [ "Tanzania", "255" ], [ "Thailand ", "66" ], [ "Timor-Leste", "670" ], [ "Togo", "228" ], [ "Tokelau", "690" ], [ "Tonga", "676" ], [ "Trinidad and Tobago", "1868" ], [ "Tunisia ", "216" ], [ "Turkey ", "90" ], [ "Turkmenistan", "993" ], [ "Turks and Caicos Islands", "1649" ], [ "Tuvalu", "688" ], [ "U.S. Virgin Islands", "1340" ], [ "Uganda", "256" ], [ "Ukraine ", "380" ], [ "United Arab Emirates", "971" ], [ "United Kingdom", "44" ], [ "United States", "1" ], [ "Uruguay", "598" ], [ "Uzbekistan ", "998" ], [ "Vanuatu", "678" ], [ "Vatican City", "39" ], [ "Venezuela", "58" ], [ "Vietnam ", "84" ], [ "Wallis and Futuna", "681" ], [ "Western Sahara", "212" ], [ "Yemen ", "967" ], [ "Zambia", "260" ], [ "Zimbabwe", "263" ] ]'>
		<form name="SMS_Form" method="POST" action={{url('sms')}} class="well form-horizontal">
			<fieldset>
				{{ csrf_field() }}
				<div class="form-group">
					<label class="col-md-4 control-label">Phone Number</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<span class="input-group-addon">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  ng-click="focusCountryInput()" aria-expanded="false">
									<i class="glyphicon glyphicon-globe" ></i>
								</a>
								<ul class="dropdown-menu" id="country_menu"  role="menu">
									<li>
										<input id="country_input" type="text" ng-model="searchCountry">
									</li>
									<li ng-repeat="country in Countries | filter:searchCountry">
										<a ng-click="complete_prefix(country[1])">
											@{{country[0]}}
										</a>
									</li>
								</ul>
							</div>
						</span>
						<span class="input-group-addon"> 
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<i class="glyphicon glyphicon-user"></i>
								</a>
								<ul class="dropdown-menu" role="menu">
									@foreach($Contacts as $contact)
										<li>
											<a ng-click="complete_contact({{$contact->phone_number}})">
												{{$contact->name}}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</span>
						<input class="form-control" ng-model="phone_number" ng-keyup="format_phone()" ng-focus="SMS_Form.phone_number.$setUntouched()" ng-model-options="{ updateOn: 'blur' }" ng-maxlength=16 ng-minlength=12 ng-pattern="/^([\+][0-9]{2}|[0-9]{4})[\s]?[0-9]{3}[\s]?[0-9]{3}/" type="text" id="phone_number_field" name="phone_number" placeholder="Phone number"  ng-style="myStyle">                       
					</div>
					<span id="phone_number_error" ng-show="SMS_Form.phone_number.$invalid && SMS_Form.phone_number.$touched">
						<i class="glyphicon glyphicon-remove-sign"></i>Inappropriate phone number!
					</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Message</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<textarea class="form-control" name="content" maxlength="160" placeholder="Your message" id="textarea_field"ng-model="message"></textarea>
						</div>
						<span id="message_length_field" ng-if="message">@{{message.length+"/160"}}</span>
					</div>
				</div>
				<div id="custom_settings" ng-show="showme">
					<div class="form-group">
						<script>
							$( function() {
								$( "#datepicker" ).datepicker();
								$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
								} );
							$( function() {
								$( "#timepicker" ).timepicker();
								$('#timepicker').timepicker({ 'timeFormat': 'H:i:s' });
							} );
						</script>
						<label class="col-md-4 control-label">Date</label>
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" id="datepicker" name="pp_date">	 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Time</label> 
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								<input type="text" id="timepicker" name="pp_time">
							</div>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">
						<button type="submit" class="btn btn-warning" ng-disabled="SMS_Form.phone_number.$invalid">
							Send <span class="glyphicon glyphicon-send"></span>
						</button>
						<button class="btn btn-warning" type="button" ng-click="showme=!showme" title="Custom Settings">
							<img src="../../../public/images/settings.png" title="Custome Settings" alt="Custom Settings" width=20 height=20>
						</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<script>
	$(document).ready(function() {
		$('#outbox').DataTable();
	} );
	</script>
	<div class="container">
		<h1 class='sms_par'>Your messages</h1>
		<table class="table-responsive" id="outbox">
			<thead class="thead-default">
				<tr>
				  <th>Phone Number</th>
				  <th>SMS</th>
				  <th></th>
				  <th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($SMSs as $sms)
					<tr>
						<td class="number_col"> 
							@if($Contacts->contains('phone_number',$sms->phone_number))
								@foreach($Contacts as $contact)
									@if($contact->phone_number == $sms->phone_number)
										{{$contact->name}}
										@break
									@endif
								@endforeach
							@else
								{{$sms->phone_number}}
							@endif
						</td>
						<td class="sms_col"> 
							{{$sms->sms_content }} 
						</td>
						<td class="date_col">  
							@if ($sms->state =='S')
								<img src="../../../public/images/sent.png" width="30" height="30" title="Sent" alt="Sent">
								{{$sms->updated_at->format("j M") }}
							@else
								<img src="../../../public/images/sending.png" width="30" height="30" title="Sending" alt="Sending">  
							@endif                       
						</td>
						<td class="trash_col"> 
							<a href="http://localhost/index.php/delete/{{$sms->id}}">
								<img src="../../../public/images/trash.png" width="30" height="30" title="Delete" alt="Delete"> 
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</body>
@endsection