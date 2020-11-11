angular.module('openITCOCKPIT')
    .controller('TestIndexController', function($scope, $http, NotyService){

        //Name TestIndexController same as in ng.states.js
        //Convention: Controller name + Action Name + 'Controller' = TestIndexController

        // private vars
        var thisIsPrivate = 'This is private';

        // public vars
        $scope.thisIsPublic = 'This is public';

       // $scope.array_monat=this->render('$array_monat');

       // console.log($scope.array_monat);

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
                $scope.output_daten= result.data.data_months;

                $scope.data.months=$scope.output_daten;
                console.log("HHHHHHHHHHHHHHHHHH");
                console.log($scope.data.months);

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
      //  $scope.load();

        $scope.init = true;

   /*    $scope.data = {
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
        }*/




        var getMonath = function(index){
            if(index < 10){
                return '0'+index;
            }

            return index;

        }

        var getColor = function(index){
            if(index == 1){
                console.log("COLOR1");
                return '#ff0000';

            }
            return '#378006';
        }
        $scope.load();
        console.log("for schleife");
        var renderCalendar = function(){
            var i=1;
            var color=0;
            for (var key in $scope.data.months){
                calendarEl = document.getElementById(key);
                console.log(key);
                console.log($scope.data.months);
                if($scope.data.months[key]>90)
                {color=1; console.log("ich bin hier");}

                $scope.calendar[i] = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                    //plugins: ['interaction', 'dayGrid', 'timeGrid'],
                    defaultDate: '2020-'+getMonath(i)+'-01',
                    events: [ '2020-01-01' ], eventColor: '#ff0000',
                    //eventColor: '#378006',
                    //borderColor:'#ff0000',
                    background:'#ff0000',
                    backgroundColor: getColor(color),




                });
               // $scope.calendar[$i].fontcolor('#ff0000');

                $scope.calendar[i].render();
                i = i + 1;
                color=0;
            }





        };
      //  $scope.load();
        setTimeout(renderCalendar, 15000);


    });


