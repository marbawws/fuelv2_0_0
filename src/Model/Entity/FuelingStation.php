<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuelingStation Entity
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 *
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Fuel[] $fuels
 */
class FuelingStation extends Entity
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
        'brand_id' => true,
        'name' => true,
        'brand' => true,
        'fuels' => true,
    ];
}
