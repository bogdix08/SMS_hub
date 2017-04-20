app.controller("myCtrl", function($scope) {
	$scope.checkphone = function() {
		if($scope.phone_number.length==0){
			$scope.error_message="";
                }
		else if(isFinite($scope.phone_number.valueOf())){
			$scope.error_message= "Innapropriate phone number!";
			$scope.myStyle={'background-color':'Wheat'};			
		}
		else if($scope.phone_number.length<12){
			$scope.error_message= "Number is too short!";
			$scope.myStyle={'background-color':'Wheat'};
		}
		else if($scope.phone_number.length>13){
			$scope.error_message= "Number is too long!";
			$scope.myStyle={'background-color':'Wheat'};
		}
	}
	$scope.format_phone = function() {
		var aux = document.getElementById("phone_number_field").value;
		 if(aux.length ==3 ||aux.length ==7||aux.length ==11){
			 aux=aux.concat(" ");
			 document.getElementById("phone_number_field").value=aux;
		 }
			  
	}
        $scope.complete_contact = function($phone_number){
			var number = String($phone_number);
			var aux1 = number.substr(0,2);
			var aux2 = number.substr(2,3);
			var aux3 = number.substr(5,3);
			var aux4 = number.substr(8,3);
              document.getElementById("phone_number_field").value='+'.concat(aux1," ",aux2," ",aux3," ",aux4);
			   document.getElementById("textarea_field").focus();
        }
		$scope.complete_prefix = function($phone_number){
              document.getElementById("phone_number_field").value='+'.concat($phone_number," ");
			  document.getElementById("phone_number_field").focus();
        }
		$scope.focusCountryInput = function() {
			var country_input = document.getElementById("country_input");
			$scope.searchCountry="";
			setTimeout(function() {country_input.focus();}, 100);		  
		}
});