angular.module("app", []).controller("AvailabilityController", function($scope, $http){

    $scope.availability={
        PSN_ID: null,
        days:{
            'monday': false,
            'tuesday': false,
            'wednesday': false,
            'thursday': false,
            'friday': false,
            'saturday': false,
            'sunday': false
        },
        times:{
            'first': false,
            'second': false,
            'third': false
        }
    };

    $scope.toggleDay=function(day){
        $scope.availability.days[day]=!$scope.availability.days[day];

    };

    $scope.toggleTime=function(time) {
        $scope.availability.times[time] = !$scope.availability.times[time];
    };

    $scope.submit=function(action){

        $http.post(action,$scope.availability)
            .success(function(res){
            console.log(res);
            }).error(function(error){
            console.log(error);
        });

    };

});