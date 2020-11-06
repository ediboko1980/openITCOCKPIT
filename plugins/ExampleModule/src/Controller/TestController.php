<?php
declare(strict_types=1);

namespace ExampleModule\Controller;


use AutoreportModule\Model\Entity\AutoreportAvailabilityLog;
use AutoreportModule\Model\Table\AutoreportAvailabilityLogTable;
use AutoreportModule\Model\Table\AutoreportsTable;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use ExampleModule\Model\Table\ExampleNotesTable;
use itnovum\openITCOCKPIT\Core\HoststatusFields;




class TestController extends AppController {

   // public function Monat_Mittelwert($evalution_start, $evalution_end, $availability_percent ) {
    //$i=$evalution_start;


    //}


    public function index() {
        if (!$this->isApiRequest()) {
            // The requested URL was: /example_module/test/index.html
            // The controller only sends the HTML template to the client browser / AngularJS

            /**********************************************************/
            /* DO NOT RUN ANY DATABASE QUERY HERE!                    */
            /* THIS CODE IS ONLY TO SHIP THE TEMPLATE                 */
            /**********************************************************/

            // Pass the variable "message" with the content "Hello World (HTML)" to the view for .html requests
            $this->set('message', 'Hello World (HTML)');
            return;
        }

        // This get executed for API requests
        //  The requested URL was: /example_module/test/index.json

        //Load ExampleNotesTable
        /** @var ExampleNotesTable $ExampleNotesTable */
        $ExampleNotesTable = TableRegistry::getTableLocator()->get('ExampleModule.ExampleNotes');

        //MEIN TEST

        /** @var AutoreportAvailabilityLogTable $AutoreportsAvailabilityLogTable */
        $AutoreportsAvailabilityLogTable = TableRegistry::getTableLocator()->get('AutoreportModule.AutoreportsAvailabilityLog');

        //Query data
        $records = $AutoreportsAvailabilityLogTable->find()
            ->order([
                'id' => 'asc'
            ])
            ->all();

        $evalution_start = [];
        $evalution_end_Monat_Name = [];


        $evalution_end = [];

        $minimal_availability_percent_arr = [];
        $determined_availability_percent = [];
        $i=0;
        $j='01';
        $monate=1;

        $LetztesDatumImMonat=[];
        $array_sollwert=[];
       // $array_monat=[];
        $data_months=[];

        foreach($records as $record)
        {
            /** @var AutoreportAvailabilityLog $record  */
            //$evalution_start[$i] =date( 'Y-m-d',$record['evaluation_start']);
            $evalution_start[$i]=date( 'm',$record['evaluation_start']);
            $evalution_end[$i]= date( 'Y-m-d',$record['evaluation_end']);

            $evalution_end_Monat_Name[$i]= date( 'F',$record['evaluation_end']);

            $minimal_availability_percent_arr[$i]= $record['minimal_availability_percent'];
            $determined_availability_percent[$i]= $record['determined_availability_percent'];


            if(strcmp ($j,$evalution_start[$i])!=0) {
                $array_sollwert[$monate] = $minimal_availability_percent_arr[$i - 1];
                $LetztesDatumImMonat[$monate] =$evalution_end[$i-1];
                $data_months[$evalution_end_Monat_Name[$i-1]]=$minimal_availability_percent_arr[$i - 1];
                $j=$evalution_start[$i];
                $monate=$monate+1;
            }

            $i=$i+1;
            //debug($record->toArray());
        }


        $data_months[$evalution_end_Monat_Name[$i-1]]=$minimal_availability_percent_arr[$i-1];


        $this->set('data_months', $data_months);


        //ENDE
        // Load Hoststatus table
        $HoststatusTable = $this->DbBackend->getHoststatusTable();

        //Query data
        $result = $ExampleNotesTable->find()
            ->order([
                'ExampleNotes.id' => 'asc'
            ])
            ->contain([
                'Hosts' => function (Query $query) {
                    $query
                        ->disableAutoFields()
                        ->select([
                            'Hosts.id',
                            'Hosts.name',
                            'Hosts.uuid',
                        ]);
                    return $query;
                }
            ])
            ->all();

        // Select fields to load
        $HoststatusFields = new HoststatusFields($this->DbBackend);
        $HoststatusFields
            ->currentState()
            ->output();

        //Query Hoststatus Table
        $hoststatus = $HoststatusTable->byUuids(
            Hash::extract($result->toArray(), '{n}.host.uuid'),
            $HoststatusFields
        );

        // Pass the variable "message" with the content "Hello World" to the JSON view
        // Pass the variable "result" to the JSON view
        $this->set('message', 'Hier bin ich...');
        $this->set('result', $result);
        $this->set('hoststatus', $hoststatus);



        // Add the variable "message" to .json output
        $this->viewBuilder()->setOption('serialize', [ 'message','hoststatus', 'result','data_months']);




    }



}

