(function(){

	var mainFactory = function($http ){
		var factory = {};

        factory.guestSession = function(){
            return $http.post('api/index.php/login/guest_session');
        }

        factory.logout = function(){
            return $http.post('api/index.php/login/logout');
        }

        factory.eventList = function(){
        	return $http.post('api/index.php/dashboard/event')
        }

        factory.requestpass = function(eventID){
            return $http.post('api/index.php/login/requestpass',eventID);
        }

		return factory;
	};
	
	mainFactory.$inject = ['$http'];
	angular.module('guestList').factory('mainFactory', mainFactory );
}());