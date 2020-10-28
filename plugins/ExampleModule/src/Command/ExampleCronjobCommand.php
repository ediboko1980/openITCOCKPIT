<?php
declare(strict_types=1);

namespace ExampleModule\Command;

use App\Model\Table\ProxiesTable;
use App\Model\Table\SystemsettingsTable;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;
use itnovum\openITCOCKPIT\Core\Interfaces\CronjobInterface;


/**
 * Class ExampleCronjobCommand
 * @package ExampleModule\Command
 */
class ExampleCronjobCommand extends Command implements CronjobInterface {

    /**
     * @param Arguments $args
     * @param ConsoleIo $io
     */
    public function execute(Arguments $args, ConsoleIo $io) {
        $io->setStyle('green', ['text' => 'green']);
        $io->setStyle('red', ['text' => 'red']);

        $io->out('This is an example', 0);

        $io->out('<green>   Ok</green>');
        $this->processQueue();
        $io->hr();
    }
}
