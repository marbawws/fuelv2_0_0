<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefTransactionTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefTransactionTypesTable Test Case
 */
class RefTransactionTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RefTransactionTypesTable
     */
    public $RefTransactionTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RefTransactionTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RefTransactionTypes') ? [] : ['className' => RefTransactionTypesTable::class];
        $this->RefTransactionTypes = TableRegistry::getTableLocator()->get('RefTransactionTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefTransactionTypes);

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
