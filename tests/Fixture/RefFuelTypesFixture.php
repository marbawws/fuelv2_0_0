<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RefFuelTypesFixture
 */
class RefFuelTypesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fuel_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fuel_specific_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Foreign_key_fuel_specific_id_de_fuel_specifics' => ['type' => 'index', 'columns' => ['fuel_specific_id'], 'length' => []],
            'Foreign_key_fuelId_de_fuels' => ['type' => 'index', 'columns' => ['fuel_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Foreign_key_fuel_specific_id_de_fuel_specifics' => ['type' => 'foreign', 'columns' => ['fuel_specific_id'], 'references' => ['fuel_specifics', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Foreign_key_fuelId_de_fuels' => ['type' => 'foreign', 'columns' => ['fuel_id'], 'references' => ['fuels', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'fuel_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'fuel_specific_id' => 1,
            ],
        ];
        parent::init();
    }
}
