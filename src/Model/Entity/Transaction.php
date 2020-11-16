<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $created
 * @property float $amount
 * @property string $other_details
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $user_id
 * @property int $fuel_type_id
 * @property int $transaction_type_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RefFuelType $ref_fuel_type
 * @property \App\Model\Entity\RefTransactionType $ref_transaction_type
 * @property \App\Model\Entity\Place[] $places
 */
class Transaction extends Entity
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
        'amount' => true,
        'other_details' => true,
        'modified' => true,
        'user_id' => true,
        'fuel_type_id' => true,
        'transaction_type_id' => true,
        'user' => true,
        'ref_fuel_type' => true,
        'ref_transaction_type' => true,
        'places' => true,
    ];
}
