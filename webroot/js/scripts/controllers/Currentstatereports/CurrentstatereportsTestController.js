angular.module('openITCOCKPIT')
    .controller('CurrentstatereportsTestController', function($rootScope, $scope, $http, $timeout){

        $scope.init = true;

        console.log('LOAD CurrentstatereportsTestController');

        $scope.data = {
            year: '2020',
            months: {
                'januar': 'daten',
                'februar': 'daten',
                'maerz': 'daten'
            }
        }

        var renderCalendar = function(){
            var calendarEl = document.getElementById('calendar'); //ID => calendar_+jahr_monat
            console.log('calendarJJJJJ');
            $scope.calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

                header: {
                    left: '',
                    center: 'title',
                    right: 'prev,next today',
                },

                navLinks: false, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                weekNumbers: true,
                weekNumbersWithinDays: false,
                weekNumberCalculation: 'ISO',
                eventOverlap: false,
                eventDurationEditable: false,

            });

            $scope.calendar.render();
            $(".fc-holidays-button")
                .wrap("<span class='dropdown'></span>")
                .addClass('btn btn-secondary dropdown-toggle')
                .attr({
                    'data-toggle': 'dropdown',
                    'type': 'button',
                    'aria-expanded': false,
                    'aria-haspopup': true
                })
                .append('<span class="caret caret-with-margin-left-5"></span>');
            $('.fc-holidays-button')
                .parent().append(
                $('<ul/>', {
                        'id': 'countryList',
                        'class': 'dropdown-menu',
                        'role': 'button'
                    }
                )
            );


        };
        renderCalendar();

    });
