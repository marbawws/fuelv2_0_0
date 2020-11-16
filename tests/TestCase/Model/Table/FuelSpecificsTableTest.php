<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuelSpecificsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuelSpecificsTable Test Case
 */
class FuelSpecificsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuelSpecificsTable
     */
    public $FuelSpecifics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FuelSpecifics',
        'app.RefFuelTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FuelSpecifics') ? [] : ['className' => FuelSpecificsTable::class];
        $this->FuelSpecifics = TableRegistry::getTableLocator()->get('FuelSpecifics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FuelSpecifics);

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
}
