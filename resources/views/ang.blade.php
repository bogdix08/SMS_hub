@extends('layouts.app')		
<title>SMS Hub</title>
<link href="/css/sms.css" rel="stylesheet">
@section('content')
		<form method="POST" action=http://metalconf.16mb.com/index.php/service/register class="sms_form form-group">
			{{ csrf_field() }}
			Phone number:<br>
			<div ng-controller="myCtrl" ng-init="error_message=''">
 <input type="text" name="username">
  <input type="text" name="email">
   <input type="text" name="password">
			<input type="submit"  value="Send">
		</form>  
    </body>
@endsection