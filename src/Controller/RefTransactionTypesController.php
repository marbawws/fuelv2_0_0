<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefTransactionTypes Controller
 *
 * @property \App\Model\Table\RefTransactionTypesTable $RefTransactionTypes
 *
 * @method \App\Model\Entity\RefTransactionType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefTransactionTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $refTransactionTypes = $this->paginate($this->RefTransactionTypes);

        $this->set(compact('refTransactionTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Transaction Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refTransactionType = $this->RefTransactionTypes->get($id, [
            'contain' => [],
        ]);

        $this->set('refTransactionType', $refTransactionType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refTransactionType = $this->RefTransactionTypes->newEntity();
        if ($this->request->is('post')) {
            $refTransactionType = $this->RefTransactionTypes->patchEntity($refTransactionType, $this->request->getData());
            if ($this->RefTransactionTypes->save($refTransactionType)) {
                $this->Flash->success(__('The ref transaction type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref transaction type could not be saved. Please, try again.'));
        }
        $this->set(compact('refTransactionType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Transaction Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refTransactionType = $this->RefTransactionTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refTransactionType = $this->RefTransactionTypes->patchEntity($refTransactionType, $this->request->getData());
            if ($this->RefTransactionTypes->save($refTransactionType)) {
                $this->Flash->success(__('The ref transaction type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref transaction type could not be saved. Please, try again.'));
        }
        $this->set(compact('refTransactionType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Transaction Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refTransactionType = $this->RefTransactionTypes->get($id);
        if ($this->RefTransactionTypes->delete($refTransactionType)) {
            $this->Flash->success(__('The ref transaction type has been deleted.'));
        } else {
            $this->Flash->error(__('The ref transaction type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
