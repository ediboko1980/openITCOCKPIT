<?php
declare(strict_types=1);

namespace ExampleModule\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use ExampleModule\Model\Table\AutoreportsAvailabilityLogTable;

/**
 * ExampleModule\Model\Table\AutoreportsAvailabilityLogTable Test Case
 */
class AutoreportsAvailabilityLogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ExampleModule\Model\Table\AutoreportsAvailabilityLogTable
     */
    protected $AutoreportsAvailabilityLog;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.ExampleModule.AutoreportsAvailabilityLog',
        'plugin.ExampleModule.Autoreports',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AutoreportsAvailabilityLog') ? [] : ['className' => AutoreportsAvailabilityLogTable::class];
        $this->AutoreportsAvailabilityLog = $this->getTableLocator()->get('AutoreportsAvailabilityLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AutoreportsAvailabilityLog);

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
