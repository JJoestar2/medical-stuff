<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Issuance Model
 *
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MedicinesTable&\Cake\ORM\Association\BelongsTo $Medicines
 *
 * @method \App\Model\Entity\Issuance newEmptyEntity()
 * @method \App\Model\Entity\Issuance newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Issuance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Issuance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Issuance findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Issuance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Issuance[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Issuance|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Issuance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Issuance[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Issuance[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Issuance[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Issuance[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class IssuanceTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('issuance');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Medicine', [
            'foreignKey' => 'medicine_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->dateTime('date_issuance')
            ->requirePresence('date_issuance', 'create')
            ->notEmptyDateTime('date_issuance');

        $validator
            ->integer('count')
            ->requirePresence('count', 'create')
            ->notEmptyString('count');

        $validator
            ->integer('store_previous')
            ->requirePresence('store_previous', 'create')
            ->notEmptyString('store_previous');

        $validator
            ->integer('store_present')
            ->requirePresence('store_present', 'create')
            ->notEmptyString('store_present');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['department_id'], 'Departments'), ['errorField' => 'department_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['medicine_id'], 'Medicine'), ['errorField' => 'medicine_id']);

        return $rules;
    }

    public function createRecord($userData, $medicine) 
    {
        $store = TableRegistry::getTableLocator()->get('Store');
        $prevCount = $store->getMedicineCount($medicine['medicine_id']);

        $newCount = $prevCount - $medicine['count'];
        $record = [
            'department_id' => $userData['department_id'],
            'user_id' => $userData['ID'],
            'medicine_id' => $medicine['medicine_id'],
            'date_issuance' => $medicine['date_issuance'],
            'count' => $medicine['count'],
            'store_previous' => $prevCount,
            'store_present' => $newCount
        ];

        return $record;
        
    }
}
