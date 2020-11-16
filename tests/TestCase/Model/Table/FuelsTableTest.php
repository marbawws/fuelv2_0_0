<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuelsTable Test Case
 */
class FuelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuelsTable
     */
    public $Fuels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Fuels',
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
        $config = TableRegistry::getTableLocator()->exists('Fuels') ? [] : ['className' => FuelsTable::class];
        $this->Fuels = TableRegistry::getTableLocator()->get('Fuels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fuels);

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
