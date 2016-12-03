<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Products;

/**
 * Chats Controller
 *
 * @property \App\Model\Table\ChatsTable $Chats
 */
class ChatsController extends AppController
{

    public function isAuthorized($user)
    {
        // All registered users can add chats
        if (in_array($this->request->action, ['index', 'add','mine'])) {
            return true;
        }

        if (in_array($this->request->action, ['view'])) {
            $chatId = (int)$this->request->params['pass'][0];
            if ($this->Chats->isOwnedBy($chatId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Products']
        ];

        $chats = $this->Chats->myChats($this->Auth->user('id'));

        $this->set(compact('chats'));
        $this->set('_serialize', ['chats']);
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Chats->Messages->newEntity();
        $chat = $this->Chats->get($id, [
            'contain' => ['Users', 'Products', 'Messages']
        ]);

        $this->set('chat', $chat);
        $this->set('message',$message);
        $this->set('_serialize', ['chat']);
    }

    /**
     * Add method
     * @param string|null $id Product id.
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $chat = $this->Chats->newEntity();

        if(!$this->Chats->alreadyExists($id, $this->Auth->user('id')))
        {
          $chat = $this->Chats->patchEntity($chat, $this->request->data);
          $chat->product_id = $id;
          $chat->user_id = $this->Auth->user('id');
          if ($this->Chats->save($chat)) {
              return $this->redirect(['action' => 'view', $chat->id]);
          } else {
              $this->Flash->error(__('The chat could not be saved. Please, try again.'));
          }
        } else {
            $this->Flash->error(__('A chat for this product already exists.'));
        }

        return $this->redirect(['controller' => 'products', 'action' => 'view', $id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chats->patchEntity($chat, $this->request->data);
            if ($this->Chats->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chat could not be saved. Please, try again.'));
            }
        }
        $users = $this->Chats->Users->find('list', ['limit' => 200]);
        $products = $this->Chats->Products->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'users', 'products'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chats->get($id);
        if ($this->Chats->delete($chat)) {
            $this->Flash->success(__('The chat has been deleted.'));
        } else {
            $this->Flash->error(__('The chat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
