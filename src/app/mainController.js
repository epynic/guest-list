(function(){

	var mainController = function($scope, $location, mainFactory, $rootScope ,facebookFactory){
		$scope.events = {};
		function init(){
			if(! $rootScope.connected ){
				facebookFactory.guestlogout().success(function(response){
					$location.path('/');
				});
			}
			
			mainFactory.guestSession().success(function(response){
				if(response.status != 'loggedin'){
					$location.path('/');
				}
			});

			mainFactory.eventList().success(function(response){
				if(response.status == 'logout'){
					$location.path('/');
				}
				$scope.events = response;
			});
		}
		init();

		$scope.requestPass = function(eventID){
			mainFactory.requestpass(eventID).success(function(response){
				if(response.status == 'already'){
					alert('Pass Request Already Sent');
				}else if( response.status == 'success'){
					alert('Pass Request Sent');
				}
			});
		};

		$scope.logout = function(){
			mainFactory.logout().success(function(){
				$location.path('/');
			});
		};
	};
	

	mainController.$inject = ['$scope','$location','mainFactory','$rootScope','facebookFactory'];
	angular.module('guestList')
					.controller('mainController', mainController);
}());
