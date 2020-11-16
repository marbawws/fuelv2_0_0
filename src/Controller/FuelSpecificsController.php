<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;

/**
 * FuelSpecifics Controller
 *
 * @property \App\Model\Table\FuelSpecificsTable $FuelSpecifics
 *
 * @method \App\Model\Entity\FuelSpecific[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuelSpecificsController extends AppController
{
    public function initialize()
    {
        parent::initialize(); //
        //$this->Auth->allow('index'); // actions logout and add do not require auth
        //$this->Auth->deny('index','view');
        I18n::setLocale($this->request->session()->read('Config.language'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fuelSpecifics = $this->paginate($this->FuelSpecifics);

        $this->set(compact('fuelSpecifics'));
    }

    /**
     * View method
     *
     * @param string|null $id Fuel Specific id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuelSpecific = $this->FuelSpecifics->get($id, [
            'contain' => ['RefFuelTypes'],
        ]);

        $this->set('fuelSpecific', $fuelSpecific);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuelSpecific = $this->FuelSpecifics->newEntity();
        if ($this->request->is('post')) {
            $fuelSpecific = $this->FuelSpecifics->patchEntity($fuelSpecific, $this->request->getData());
            if ($this->FuelSpecifics->save($fuelSpecific)) {
                $this->Flash->success(__('The fuel specific has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel specific could not be saved. Please, try again.'));
        }
        $this->set(compact('fuelSpecific'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fuel Specific id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuelSpecific = $this->FuelSpecifics->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuelSpecific = $this->FuelSpecifics->patchEntity($fuelSpecific, $this->request->getData());
            if ($this->FuelSpecifics->save($fuelSpecific)) {
                $this->Flash->success(__('The fuel specific has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuel specific could not be saved. Please, try again.'));
        }
        $this->set(compact('fuelSpecific'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fuel Specific id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuelSpecific = $this->FuelSpecifics->get($id);
        if ($this->FuelSpecifics->delete($fuelSpecific)) {
            $this->Flash->success(__('The fuel specific has been deleted.'));
        } else {
            $this->Flash->error(__('The fuel specific could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
