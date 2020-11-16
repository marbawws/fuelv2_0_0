<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Place Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $details
 * @property int|null $photo_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Photo $photo
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Place extends Entity
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
        'description' => true,
        'details' => true,
        'photo_id' => true,
        'created' => true,
        'modified' => true,
        'photo' => true,
        'transactions' => true,
    ];
}
