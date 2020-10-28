<?php
declare(strict_types=1);

namespace ExampleModule\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ExampleModule\Model\Table\ExampleNotesTable;

/**
 * ExampleModule\Model\Table\ExampleNotesTable Test Case
 */
class ExampleNotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ExampleModule\Model\Table\ExampleNotesTable
     */
    protected $ExampleNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.ExampleModule.ExampleNotes',
        'plugin.ExampleModule.Hosts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ExampleNotes') ? [] : ['className' => ExampleNotesTable::class];
        $this->ExampleNotes = $this->getTableLocator()->get('ExampleNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExampleNotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
