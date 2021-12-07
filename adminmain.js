var app=angular.module('formvalid', ['ui.bootstrap','ui.utils']);
app.controller('validationCtrl',function($scope){
  $scope.data=[
    ]

$scope.dataTableOpt = {
  "aLengthMenu": [[1,2,3,5,10, 20, 50,-1], [1,2,3,5,10, 20, 50,'All']],
  };
});