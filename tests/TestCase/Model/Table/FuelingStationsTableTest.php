<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuelingStationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuelingStationsTable Test Case
 */
class FuelingStationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuelingStationsTable
     */
    public $FuelingStations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FuelingStations',
        'app.Brands',
        'app.Fuels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FuelingStations') ? [] : ['className' => FuelingStationsTable::class];
        $this->FuelingStations = TableRegistry::getTableLocator()->get('FuelingStations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FuelingStations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
