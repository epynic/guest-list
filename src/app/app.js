(function(){
	var app = angular.module('guestList' ,['ngRoute','cngFacebook']);

	app.config(function($routeProvider){
		$routeProvider
			.when('/', {
				controller:'homeController',
				templateUrl:'app/views/home.html'
			})
			.when('/dashboard', {
				controller:'mainController',
				templateUrl:'app/views/dashboard.html'
			})
			.when('/signup', {
				controller:'homeController',
				templateUrl:'app/views/signup.html'
			})
			.otherwise({ redirectTo : '/'});
	});

	app.run(function ($rootScope, $location, facebook, facebookFactory ) {
        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            $rootScope.$on('fb.auth.authResponseChange', function (event, response) {
		        $rootScope.$apply (function () {
		        	$rootScope.connected = (response.status == 'connected');
		            if ($rootScope.connected) {
					    facebook.api('me').then (function (result) {
					       	$rootScope.user = result;
					       	facebookFactory.guestLogin($rootScope.user).success(function(data){
					       		if( data.status == 'new'){
					       			$location.path("/signup");
					       		}else if(data.status == 'loggedin'){
					       			$location.path("/dashboard");
					       		}else{
					       			$location.path('/');
					       		}
						    });
					    });
					} else {
					     $rootScope.user = null;
					     $location.path('/');
					}
		        });
		    });  
        });

    });

}());