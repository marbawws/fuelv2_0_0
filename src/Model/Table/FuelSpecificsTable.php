<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuelSpecifics Model
 *
 * @property \App\Model\Table\RefFuelTypesTable&\Cake\ORM\Association\HasMany $RefFuelTypes
 *
 * @method \App\Model\Entity\FuelSpecific get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuelSpecific newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuelSpecific[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuelSpecific|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelSpecific saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelSpecific patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuelSpecific[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuelSpecific findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FuelSpecificsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fuel_specifics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('RefFuelTypes', [
            'foreignKey' => 'fuel_specific_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('quantity_in_stock')
            ->requirePresence('quantity_in_stock', 'create')
            ->notEmptyString('quantity_in_stock');

        $validator
            ->numeric('unit_buying_price')
            ->requirePresence('unit_buying_price', 'create')
            ->notEmptyString('unit_buying_price');

        $validator
            ->numeric('unit_sales_price')
            ->requirePresence('unit_sales_price', 'create')
            ->notEmptyString('unit_sales_price');

        return $validator;
    }
}
