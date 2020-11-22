<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;

/**
 * RefFuelTypes Controller
 *
 * @property \App\Model\Table\RefFuelTypesTable $RefFuelTypes
 *
 * @method \App\Model\Entity\RefFuelType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefFuelTypesController extends AppController
{
    public function initialize()
    {
        parent::initialize(); //
        //$this->Auth->allow('index'); // actions logout and add do not require auth
        //$this->Auth->deny('index','view');
        I18n::setLocale($this->request->session()->read('Config.language'));
        $this->viewBuilder()->setLayout('cakephp_default');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fuels', 'FuelSpecifics'],
        ];
        $refFuelTypes = $this->paginate($this->RefFuelTypes);

        $this->set(compact('refFuelTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refFuelType = $this->RefFuelTypes->get($id, [
            'contain' => ['Fuels', 'FuelSpecifics'],
        ]);

        $this->set('refFuelType', $refFuelType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refFuelType = $this->RefFuelTypes->newEntity();
        if ($this->request->is('post')) {
            $refFuelType = $this->RefFuelTypes->patchEntity($refFuelType, $this->request->getData());
            if ($this->RefFuelTypes->save($refFuelType)) {
                $this->Flash->success(__('The ref fuel type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref fuel type could not be saved. Please, try again.'));
        }
        $fuels = $this->RefFuelTypes->Fuels->find('list', ['limit' => 200]);
        $fuelSpecifics = $this->RefFuelTypes->FuelSpecifics->find('list', ['limit' => 200]);
        $this->set(compact('refFuelType', 'fuels', 'fuelSpecifics'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refFuelType = $this->RefFuelTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refFuelType = $this->RefFuelTypes->patchEntity($refFuelType, $this->request->getData());
            if ($this->RefFuelTypes->save($refFuelType)) {
                $this->Flash->success(__('The ref fuel type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref fuel type could not be saved. Please, try again.'));
        }
        $fuels = $this->RefFuelTypes->Fuels->find('list', ['limit' => 200]);
        $fuelSpecifics = $this->RefFuelTypes->FuelSpecifics->find('list', ['limit' => 200]);
        $this->set(compact('refFuelType', 'fuels', 'fuelSpecifics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Fuel Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refFuelType = $this->RefFuelTypes->get($id);
        if ($this->RefFuelTypes->delete($refFuelType)) {
            $this->Flash->success(__('The ref fuel type has been deleted.'));
        } else {
            $this->Flash->error(__('The ref fuel type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
