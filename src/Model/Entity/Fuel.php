<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fuel Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $brand_id
 * @property int $fueling_station_id
 *
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\FuelingStation $fueling_station
 * @property \App\Model\Entity\RefFuelType[] $ref_fuel_types
 */
class Fuel extends Entity
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
        'name' => true,
        'brand_id' => true,
        'fueling_station_id' => true,
        'brand' => true,
        'fueling_station' => true,
        'ref_fuel_types' => true,
    ];
}
