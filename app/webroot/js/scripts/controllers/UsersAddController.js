angular.module('openITCOCKPIT')
    .controller('UsersAddController', function($scope, $http, $rootScope, $state, NotyService){

        $scope.post = {
            'User': {
                'status':'',
                'email':'',
                'firstname':'',
                'lastname':'',
                'company':'',
                'position':'',
                'phone':'',
                'password':'',
                'usergroup':{

                },
            },
            'Containers':{

            },
        };

        $scope.loadContainer = function(){
            $http.get("/containers/loadContainersForAngular.json", {
                params: {
                    'angular': true
                }
            }).then(function(result){
                $scope.containers = result.data.containers;
                $scope.init = false;
            });
        };

        $scope.loadUsergroups = function(){
            $http.get("/usergroups/loadUsergroups.json", {
                params: {
                    'angular': true
                }
            }).then(function(result){
                $scope.usergroups = result.data.usergroups;
                $scope.init = false;
            });
        };

        $scope.loadStatus = function(){
            $http.get("/users/loadStatus.json", {
                params: {
                    'angular': true
                }
            }).then(function(result){
                $scope.status = result.data.status;
                $scope.init = false;
            });
        };


        $scope.submit = function() {
            $http.post("/users/add/.json?angular=true",
                $scope.post
            ).then(function(result) {
                NotyService.genericSuccess();
                $state.go('UsersIndex');

            }, function errorCallback (result) {
                NotyService.genericError();

                if (result.data.hasOwnProperty('error')) {
                    $scope.errors = result.data.error;
                }
            });
        };


        $scope.loadContainer();
        $scope.loadUsergroups();
        $scope.loadStatus();
    });
