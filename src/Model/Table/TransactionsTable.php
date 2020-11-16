<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RefFuelTypesTable&\Cake\ORM\Association\BelongsTo $RefFuelTypes
 * @property \App\Model\Table\RefTransactionTypesTable&\Cake\ORM\Association\BelongsTo $RefTransactionTypes
 * @property \App\Model\Table\PlacesTable&\Cake\ORM\Association\BelongsToMany $Places
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RefFuelTypes', [
            'foreignKey' => 'fuel_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RefTransactionTypes', [
            'foreignKey' => 'transaction_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Places', [
            'foreignKey' => 'transaction_id',
            'targetForeignKey' => 'place_id',
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
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('other_details')
            ->maxLength('other_details', 255)
            ->requirePresence('other_details', 'create')
            ->notEmptyString('other_details');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['fuel_type_id'], 'RefFuelTypes'));
        $rules->add($rules->existsIn(['transaction_type_id'], 'RefTransactionTypes'));

        return $rules;
    }

    // The $query argument is a query builder instance.
// The $options array will contain the 'tags' option we passed
// to find('tagged') in our controller action.
    public function findPlaced(Query $query, array $options)
    {
        $columns = [
            'Transactions.id', 'Transactions.created', 'Transactions.amount',
            'Transactions.other_details', 'Transactions.modified', 'Transactions.user_id',
            'Transactions.fuel_type_id', 'Transactions.transaction_type_id'
        ];

        $query = $query
            ->select($columns)
            ->distinct($columns);

        if (empty($options['places'])) {
            // If there are no tags provided, find articles that have no tags.
            $query->leftJoinWith('Places')
                ->where(['Places.name IS' => null]);
        } else {
            // Find articles that have one or more of the provided tags.
            $query->innerJoinWith('Places')
                ->where(['Places.name IN' => $options['places']]);
        }

        return $query->group(['Transactions.id']);
    }
}
