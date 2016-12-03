<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 */
class MessagesController extends AppController
{

    public function isAuthorized($user)
    {
        // All registered users can add messages
        if ($this->request->action === 'add') {
            return true;
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
            'contain' => ['Chats']
        ];
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    /**
     * Add method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->data);
            $message->chat_id = $id;
            if ($this->Messages->save($message)) {
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message could not be sent. Please, try again.'));
            }
        }
        $chats = $this->Messages->Chats->find('list', ['limit' => 200]);
        $this->set(compact('message', 'chats'));
        $this->set('_serialize', ['message']);
    }

}
