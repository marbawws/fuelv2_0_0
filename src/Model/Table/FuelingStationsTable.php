<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuelingStations Model
 *
 * @property \App\Model\Table\BrandsTable&\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\FuelsTable&\Cake\ORM\Association\HasMany $Fuels
 *
 * @method \App\Model\Entity\FuelingStation get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuelingStation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuelingStation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuelingStation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelingStation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuelingStation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuelingStation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuelingStation findOrCreate($search, callable $callback = null, $options = [])
 */
class FuelingStationsTable extends Table
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

        $this->setTable('fueling_stations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Fuels', [
            'foreignKey' => 'fueling_station_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));

        return $rules;
    }
}
