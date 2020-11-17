<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fuels Controller
 *
 * @property \App\Model\Table\FuelsTable $Fuels
 *
 * @method \App\Model\Entity\Fuel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuelsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['findFuels', 'add', 'edit', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fuels = $this->paginate($this->Fuels);

        $this->set(compact('fuels'));
    }
    public function findFuels()
    {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Fuels->find('all', array(
                'conditions' => array('Fuels.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    /**
     * View method
     *
     * @param string|null $id Fuel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuel = $this->Fuels->get($id, [
            'contain' => ['RefFuelTypes'],
        ]);

        $this->set('fuel', $fuel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuel = $this->Fuels->newEntity();
        if ($this->request->is('post')) {
            $fuel = $this->Fuels->patchEntity($fuel, $this->request->getData());
            if ($this->Fuels->save($fuel)) {
                $this->Flash->success(__('The fuel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel could not be saved. Please, try again.'));
        }
        $this->set(compact('fuel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fuel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuel = $this->Fuels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuel = $this->Fuels->patchEntity($fuel, $this->request->getData());
            if ($this->Fuels->save($fuel)) {
                $this->Flash->success(__('The fuel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel could not be saved. Please, try again.'));
        }
        $this->set(compact('fuel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fuel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuel = $this->Fuels->get($id);
        if ($this->Fuels->delete($fuel)) {
            $this->Flash->success(__('The fuel has been deleted.'));
        } else {
            $this->Flash->error(__('The fuel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
