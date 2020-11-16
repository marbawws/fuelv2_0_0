<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    public function initialize()
    {
        parent::initialize(); //
        $this->Auth->allow('place'); // actions logout and add do not require auth
        //$this->Auth->deny('index','view');
        I18n::setLocale($this->request->session()->read('Config.language'));
        $this->Auth->allow(['findObecCities', 'add', 'edit', 'delete']);
    }
    public function findObecCities()
    {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->ObecCities->find('all', array(
                'conditions' => array('ObecCities.nazev LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['nazev'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add actions are always allowed to logged in users.
        if (in_array($action, ['add'])) {
            return true;
        }

        // All other actions require an id.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $transaction = $this->Transactions->get($id);

        return $transaction->user_id === $user['id'];
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'RefFuelTypes', 'RefTransactionTypes'],
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Users', 'RefFuelTypes', 'RefTransactionTypes', 'Places'],
        ]);

        $this->set('transaction', $transaction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

            $transaction->user_id = $this->Auth->user('id');

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $refFuelTypes = $this->Transactions->RefFuelTypes->find('list', ['limit' => 200]);
        $refTransactionTypes = $this->Transactions->RefTransactionTypes->find('list', ['limit' => 200]);
        $places = $this->Transactions->Places->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'users', 'refFuelTypes', 'refTransactionTypes', 'places'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Places'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $users = $this->Transactions->Users->find('list', ['limit' => 200]);
        $refFuelTypes = $this->Transactions->RefFuelTypes->find('list', ['limit' => 200]);
        $refTransactionTypes = $this->Transactions->RefTransactionTypes->find('list', ['limit' => 200]);
        $places = $this->Transactions->Places->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'users', 'refFuelTypes', 'refTransactionTypes', 'places'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function place(){
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $places = $this->request->getParam('pass');

        // Use the ArticlesTable to find tagged articles.
        $transactions = $this->Transactions->find('placed', [
            'places' => $places
        ]);

        // Pass variables into the view template context.
        $this->set([
            'transactions' => $transactions,
            'places' => $places
        ]);
    }
}
