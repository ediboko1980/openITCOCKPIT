angular.module('openITCOCKPIT')
    .controller('TestIndexController', function($scope, $http, NotyService){

        //Name TestIndexController same as in ng.states.js
        //Convention: Controller name + Action Name + 'Controller' = TestIndexController

        // private vars
        var thisIsPrivate = 'This is private';

        // public vars
        $scope.thisIsPublic = 'This is public';


        // noch eine public variablen
        $scope.neuevariable= 'Mein erster Test';

        $scope.neuevariable2= 'Mein zweiter Test';

        $scope.neuevariable3= 'Hier steht der Name';

        $scope.neueueue = [];



        NotyService.genericSuccess();


        $scope.load = function(){

            // Query String parameters
            var params = {
                'angular': true
            };

            $http.get("/example_module/test/index.json", {
                params: params
            }).then(function(result){

                //Save notes from json result into local $scope.notes variable
                $scope.notes = result.data.result;


            }, function errorCallback(result){
                if(result.status === 403){
                    $state.go('403');
                }

                if(result.status === 404){
                    $state.go('404');
                }
            });
        };

        $scope.addNote = function(){
            $scope.notes.push(
                {
                    host: {
                        name: "hardcoded"
                    },
                    notes: $scope.thisIsPublic
                }
            );
            };

        $scope.addNote2 = function(){
            $scope.neueueue.push(
                {
                    notiz: $scope.neuevariable3,
                    notes1: $scope.neuevariable,
                    notes2: $scope.neuevariable2,
                }
            );
            };



        //Fire on page load
        $scope.load();

    });
