(function(){

	var facebookFactory = function($http ){
		var factory = {};

        factory.guestLogin = function( parameters ){
            return $http.post('api/index.php/login',parameters);
        }

        factory.signUp = function(data){
            return $http.post('api/index.php/login/signup',data);
        };

        factory.guestSession = function(){
            return $http.post('api/index.php/login/guest_session');
        }

        factory.guestlogout = function(){
            return $http.post('api/index.php/login/logout');
        }

		return factory;
	};
	
	facebookFactory.$inject = ['$http'];
	angular.module('guestList').factory('facebookFactory', facebookFactory );
}());