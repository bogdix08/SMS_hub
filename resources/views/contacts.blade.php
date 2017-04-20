@extends('layouts.app')		
<title>SMS Hub</title>
<link href="../../../public/css/sms.css" rel="stylesheet">
@section('content')
<div class="container contact_container" ng-controller="myCtrl">

    <form name="Contact_Form" class="well form-horizontal" action={{url('contacts')}} method="post"  id="contact_form">
     {{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<legend>Add Contact</legend>

<!-- Text input-->

<div class="form-group" >
  <label class="col-md-4 control-label">Contact Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="name" placeholder="Name" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Phone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
		<input class="form-control" ng-keyup="format_phone()" ng-maxlength=16 ng-minlength=12 ng-pattern="/^[\+]?[0-9]{2}[\s]?\d?\d?[0-9]{3}[\s]?[0-9]{3}/" type="text" id="phone_number_field" name="phone_number" placeholder="Phone number" ng-model="phone_number" ng-style="myStyle">
		<span class="error" ng-show="Contact_Form.phone_number.$invalid && Contact_Form.phone_number.$touched">
			Inappropriate phone number
		</span>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
	<button type="submit" class="btn btn-warning" ng-disabled="Contact_Form.phone_number.$invalid">Save<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>
</fieldset>
</form>
</div>
</div>
<div class="container">
<h1 class='sms_par'>Your contacts</h1>
          <table class="table-responsive">
			<thead class="thead-default">
				<tr>
				  <th>Name</th>
				  <th>Phone Number</th>
				  <th></th>
				</tr>
			 </thead>
			 <tbody>

			 
			 @foreach($Contacts as $contact)
				<tr class="table-active">
					<td class="name_col"> {{$contact->name }} </td>
					<td class="number_col"> {{$contact->phone_number }} </td>
					<td class="trash_col"> <a href="http://localhost/index.php/contacts/delete/{{$contact->id}}"><img src="../../../public/images/trash.png" alt="Delete" title="Delete" width="30" height="30"> </td>
				</tr>
			@endforeach
			</tbody>
        </table>
</div>
    </body>
@endsection
