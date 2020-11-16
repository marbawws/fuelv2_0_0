<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuelSpecific Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $quantity_in_stock
 * @property float $unit_buying_price
 * @property float $unit_sales_price
 *
 * @property \App\Model\Entity\RefFuelType[] $ref_fuel_types
 */
class FuelSpecific extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'quantity_in_stock' => true,
        'unit_buying_price' => true,
        'unit_sales_price' => true,
        'ref_fuel_types' => true,
    ];
}
