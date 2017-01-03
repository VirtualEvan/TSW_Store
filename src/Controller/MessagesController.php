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
        // All registered users can add messages in their own chats
        if ($this->request->action === 'add') {
            $chatId = (int)$this->request->params['pass'][0];
            $this->loadModel('Chats');
            if ($this->Chats->isOwnedBy($chatId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
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
            if($this->Chats->get($id)->user_id == $this->Auth->user('id'))
            {
                $message->sender = 1;
            }
            else
            {
                $message->sender = 0;
            }

            if ($this->Messages->save($message)) {
                return $this->redirect(['controller' => 'chats', 'action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The message could not be sent. Please, try again.'));
            }
        }
        $chats = $this->Messages->Chats->find('list', ['limit' => 200]);
        $this->set(compact('message', 'chats'));
        $this->set('_serialize', ['message']);
    }

}
