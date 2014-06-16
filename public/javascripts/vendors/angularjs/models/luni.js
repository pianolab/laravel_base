(function(){
  var app = angular.module('luni',['ngRoute']);

  // controller Json
  app.controller("JsonController", function($scope, $http){



  });
  // controller Rountes
  app.config(function($routeProvider) {
    $routeProvider

    // route for the about page
    .when('/home', {
      templateUrl : base_url + '/home',
      controller  : 'portfolioController'
    })

    .when('/portfolio', {
      templateUrl : base_url + '/portfolio',
      controller  : 'portfolioController'
    })

  });

  app.controller('portfolioController', function($scope, $http) {
    $scope.portList = [];

    $http({
      method: 'GET',
      url: base_url + 'json/portfolio.json'
    })
    .success(function (data, status, headers, config) {
      $scope.portList = data;
    })
    .error(function (data, status, headers, config) {
    // something went wrong :(
    });
  });

  // end
})();