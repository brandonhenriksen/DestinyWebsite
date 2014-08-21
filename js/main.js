angular.module("app", []).controller("AvailabilityController", function($scope, $http){

    $scope.availability={
        PSN_ID:"",
        days:{},
        times:{}
    };

    $scope.toggleDay=function(day){
        $scope.availability.days[day]=!$scope.availability.days[day];

    };

    $scope.toggleTime=function(time) {
        $scope.availability.times[time] = !$scope.availability.times[time];
    };

    $scope.submit=function(){
        $http({
            method : 'POST',
            url : 'save.php',
            data: $scope.availability


        }).success(function(res){
            console.log(res);
        }).error(function(error){
            console.log(error);
        });

    };


});