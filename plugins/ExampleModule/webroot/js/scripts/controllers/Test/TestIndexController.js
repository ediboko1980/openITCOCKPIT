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

        $scope.calendar = [];

        NotyService.genericSuccess();
       // $scope.calendarEl= [];

        $scope.data = {
            year: '2020',
            months: {

            }
        }

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

            $http.get("/example_module/test/index.json", {
                params: params
            }).then(function(result){

                //Save notes from json $array_monat into local $scope.notes variable
               // $scope.testdata = array_monat;//data.$array_monat;

                console.log(result);
               // console.log("test");
            }, function errorCallback(array_monat){
                if(array_monat.status === 403){
                    $state.go('403');
                }

                if(array_monat.status === 404){
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


        //hier test


        $scope.init = true;

        console.log('LOAD TestIndexController');

        $scope.data = {
            year: '2020',
            months: {
                'Januar': 'daten',
                'Februar': 'daten222',
                'Maerz': 'daten',
                'April': 'daten',
                'Mai': 'daten',
                'Juni': 'daten',
                'Juli': 'daten',
                'August': 'daten',
                'September': 'daten',
                'Oktober': 'daten',
                'November': 'daten',
                'Dezember': 'daten'

            }
        }





        var getMonath = function(index){
            if(index < 10){
                return '0'+index;
            }

            return index;
        }

        var renderCalendar = function(){
            var $i=1;
            for (var key in $scope.data.months){
                //console.log(10);
                calendarEl = document.getElementById(key);
                console.log(key);
                console.log($scope.data.months);
                $scope.calendar[$i] = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                    defaultDate: '2020-'+getMonath($i)+'-01',
                    eventColor: '#378006'
                });
                $scope.calendar[$i].render();
               $i = $i + 1;
            }





        };

        setTimeout(renderCalendar, 150);


    });


