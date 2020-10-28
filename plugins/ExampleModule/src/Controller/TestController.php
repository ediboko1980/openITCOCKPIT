<?php
declare(strict_types=1);

namespace ExampleModule\Controller;


use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use ExampleModule\Model\Table\ExampleNotesTable;
use itnovum\openITCOCKPIT\Core\HoststatusFields;

class TestController extends AppController {

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
        $this->set('mytest','Hallo');

        // Add the variable "message" to .json output
        $this->viewBuilder()->setOption('serialize', [ 'message','hoststatus', 'result', 'mytest']);
    }

}
