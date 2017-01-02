<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['index', 'view','search']);
    }

    public function isAuthorized($user)
    {
        // All registered users can add products
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of a product can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $productId = (int)$this->request->params['pass'][0];
            if ($this->Products->isOwnedBy($productId, $user['id'])) {
                return true;
            }
        }

        //My product for each owner
        if($this->request->action === 'mine'){
            return $this->Auth->user('id') == (int)$this->request->params['pass'][0];
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
            'contain' => ['Users']
        ];
        $products = $this->paginate($this->Products);

        foreach($products as $product){
          if(strlen($product->name)>15){
            $product->name = substr($product->name, 0, 15)."...";
          }
        }

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function mine($id = null)
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $products = $this->paginate($this->Products->findByUserId($id));

        foreach($products as $product){
          if(strlen($product->name)>15){
            $product->name = substr($product->name, 0, 15)."...";
          }
        }

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
        $this->render('index');
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'Chats']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $product = $this->Products->newEntity();
        if ($this->request->is('post'))
        {
            $file = $this->request->data['upload'];
            $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
            $allowedExtensions = array('jpg', 'jpeg', 'png');

            $hashName = time() . "_" . rand(000000, 999999);

            $product = $this->Products->patchEntity($product, $this->request->data);
            if (in_array($extension, $allowedExtensions)) {
                //prepare the filename for database entry
                $imageFileName = $hashName . '.' . $extension;

                //do the actual uploading of the file. First arg is the tmp name, second arg is
                //where we are putting it
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/Products/' . $imageFileName);

                $product->image = $imageFileName;
            }

            $product->user_id = $this->Auth->user('id');

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        $actualImage = $product->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);

            if (!empty($this->request->data['upload']['name']))
            {
                $file = $this->request->data['upload'];
                $extension = substr(strtolower(strrchr($file['name'], '.')), 1);
                $allowedExtensions = array('jpg', 'jpeg', 'png');

                $hashName = time() . "_" . rand(000000, 999999);

                if (in_array($extension, $allowedExtensions)) {
                    //prepare the filename for database entry
                    $imageFileName = $hashName . '.' . $extension;

                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/Products/' . $imageFileName);

                    $product->image = $imageFileName;
                }
            }

            $product->user_id = $this->Auth->user('id');

            if ($this->Products->save($product)) {
                if (!empty($this->request->data['upload']['name'])) {
                    unlink(WWW_ROOT . 'img/Products/' . $actualImage);
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            unlink(WWW_ROOT . 'img/Products/' . $product->image);
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        if(isset($this->request->data["keyword"]))
        {
            $keyword = $this->request->data["keyword"];
            $cond = array("OR" => array(
                "Products.name LIKE '%$keyword%'",
                "Products.description LIKE '%$keyword%'"
            ));
            $products = $this->Products->find("all", array("conditions" => $cond))->contain(['Users']);
            $this->set(compact("products"));

            $this->render('index');
        }
        else {
            return $this->redirect(['action' => 'index']);
        }
    }
}
