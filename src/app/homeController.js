(function(){

	var homeController = function($scope, facebookFactory, $location){

		$scope.saveCustomer = function(data){
			var err = false;
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(data.email)) {
				err = true;
				$scope.errSignUp = 'Invaild email/mobile';
			}
			
			var mob = /^[1-9]{1}[0-9]{9}$/;
    		if (! mob.test(data.mobileno)) {
				err = true;
		       $scope.errSignUp = 'Invaild email/mobile no';
   			}

   			if( !err ){
   				facebookFactory.signUp(data).success(function(response){
				if(response.status == 'loggedin'){
						$location.path('/dashboard');
					}else if( response.status == 'exists'){
						$scope.errSignUp = 'Email / Mobile Already Registered :(';
					}else{
						$location.path('/');
					}
				});
   			}
		};
	};
	

	homeController.$inject = ['$scope','facebookFactory','$location'];
	angular.module('guestList')
					.controller('homeController', homeController);
}());