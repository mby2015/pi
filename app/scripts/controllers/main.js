'use strict';

/**
 * @ngdoc function
 * @name pinfoApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the pinfoApp
 */
angular.module('pinfoApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
