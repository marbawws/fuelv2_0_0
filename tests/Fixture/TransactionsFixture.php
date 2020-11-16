<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'amount' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'other_details' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fuel_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'transaction_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Foreign_key_fuelTypeCode_de_refFuelTypes_a_Transactions' => ['type' => 'index', 'columns' => ['fuel_type_id'], 'length' => []],
            'Foreign_key_transactionTypeCode_de_reftranstypes_a_Transactions' => ['type' => 'index', 'columns' => ['transaction_type_id'], 'length' => []],
            'Foreign_key_userId_a_Transactions' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Foreign_key_fuelTypeCode_de_refFuelTypes_a_Transactions' => ['type' => 'foreign', 'columns' => ['fuel_type_id'], 'references' => ['ref_fuel_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Foreign_key_transactionTypeCode_de_reftranstypes_a_Transactions' => ['type' => 'foreign', 'columns' => ['transaction_type_id'], 'references' => ['ref_transaction_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Foreign_key_userId_a_Transactions' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2020-11-15',
                'amount' => 1,
                'other_details' => 'Lorem ipsum dolor sit amet',
                'modified' => '2020-11-15',
                'user_id' => 1,
                'fuel_type_id' => 1,
                'transaction_type_id' => 1,
            ],
        ];
        parent::init();
    }
}
