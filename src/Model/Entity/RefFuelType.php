<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefFuelType Entity
 *
 * @property int $id
 * @property int $fuel_id
 * @property string $description
 * @property int $fuel_specific_id
 *
 * @property \App\Model\Entity\Fuel $fuel
 * @property \App\Model\Entity\FuelSpecific $fuel_specific
 */
class RefFuelType extends Entity
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
        'fuel_id' => true,
        'description' => true,
        'fuel_specific_id' => true,
        'fuel' => true,
        'fuel_specific' => true,
    ];
}
