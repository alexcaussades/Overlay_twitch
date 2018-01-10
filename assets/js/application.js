
'use strict';
const atroHUD = angular.module('atroHUD', []);

(function(app){     
  app.controller('SubscribersCtrl', ['$scope', '$http', '$interval', function($scope, $http, $interval) {
    GetlastSub();
    function GetlastSub() {
      $http({
        method: 'GET',
        url: 'http://alexcaussades.com/Overlay/?request=subscribers'
      }).then(function successCallback(response) {
        $scope.subscriber = response.data;
      }, function errorCallback(response) {
        $scope.subscriber = "Un probléme es survenu";
      });
    }
    $interval(GetlastSub, 5000);
  }]);
  app.controller('DonatorsCTRL', ['$scope', '$http', '$interval', function($scope, $http, $interval) {
    GetLastDon();
    function GetLastDon() {
      $http({
        method: 'GET',
        url: 'http://alexcaussades.com/Overlay/?request=donators'
      }).then(function successCallback(response) {
        $scope.donator = response.data;
      }, function errorCallback(response) {
        $scope.donator = "Un probléme es survenu";
      });
    }
    $interval(GetLastDon, 5000);
  }]); 
})(atroHUD);