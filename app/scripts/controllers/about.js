'use strict';

/**
 * @ngdoc function
 * @name pinfoApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the pinfoApp
 */
angular.module('pinfoApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
