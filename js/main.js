angular.module("app", []).controller("AvailabilityController", function($scope, $http, $filter){

    $scope.availability={
        psn_name: null,
        days:[],
        times:[]
    };

    $scope.toggleDay=function(day){
        if($scope.availability.days.indexOf(day) === -1){
            $scope.availability.days.push(day);
        }else{
            _.pull($scope.availability.days, day);
        }

    };

    $scope.toggleTime=function(time){
        if($scope.availability.times.indexOf(time) === -1){
            $scope.availability.times.push(time);
        }else{
            _.pull($scope.availability.times, time);
        }

    };

    $scope.submit=function(action){

        $http.post(action,$scope.availability)
            .success(function(res){
            if(res.success){
                $scope.success=true;
            }else{
                $scope.error=res.error;
            }
            }).error(function(error){
            console.log(error);
        });

    };

});