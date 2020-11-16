<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefTransactionTypes Model
 *
 * @method \App\Model\Entity\RefTransactionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefTransactionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefTransactionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefTransactionType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefTransactionType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefTransactionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefTransactionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefTransactionType findOrCreate($search, callable $callback = null, $options = [])
 */
class RefTransactionTypesTable extends Table
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

        $this->setTable('ref_transaction_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
}
