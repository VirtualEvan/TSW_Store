<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Chat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chat findOrCreate($search, callable $callback = null)
 */
class ChatsTable extends Table
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

        $this->table('chats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'chat_id'
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
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }

    public function isOwnedBy($chatId, $currentuserId)
    {
        $chat = $this->get($chatId, ['contain' => ['Products']]);

        if( ($chat->user_id == $currentuserId) || ($chat->product->user_id == $currentuserId) )
        {
            return true;
        }

        return false;
    }

    public function myChats($userId)
    {
        $conditions = array(
            "OR" => array(
                "Chats.user_id = '$userId'",
                "Products.user_id = $userId AND Chats.product_id = Products.id"
            )
        );

        return $this->find("all", array('contain' => array('Products' => array('conditions'=>$conditions))));
    }

    public function alreadyExists($productId, $userId)
    {
        return $this->exists(['product_id' => $productId, 'user_id' => $userId]);
    }
}
