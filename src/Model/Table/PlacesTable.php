<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Places Model
 *
 * @property \App\Model\Table\PhotosTable&\Cake\ORM\Association\BelongsTo $Photos
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\BelongsToMany $Transactions
 *
 * @method \App\Model\Entity\Place get($primaryKey, $options = [])
 * @method \App\Model\Entity\Place newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Place[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Place|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Place saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Place patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Place[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Place findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlacesTable extends Table
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

        $this->addBehavior('Translate', ['fields' => ['name', 'description']]);

        $this->setTable('places');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Photos', [
            'foreignKey' => 'photo_id',
        ]);
        $this->belongsToMany('Transactions', [
            'foreignKey' => 'place_id',
            'targetForeignKey' => 'transaction_id',
            'joinTable' => 'places_transactions',
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

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('details')
            ->maxLength('details', 255)
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

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
        $rules->add($rules->existsIn(['photo_id'], 'Photos'));

        return $rules;
    }
}
