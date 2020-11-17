<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FuelingStations Controller
 *
 * @property \App\Model\Table\FuelingStationsTable $FuelingStations
 *
 * @method \App\Model\Entity\FuelingStation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuelingStationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Brands'],
        ];
        $fuelingStations = $this->paginate($this->FuelingStations);

        $this->set(compact('fuelingStations'));
    }

    /**
     * View method
     *
     * @param string|null $id Fueling Station id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuelingStation = $this->FuelingStations->get($id, [
            'contain' => ['Brands', 'Fuels'],
        ]);

        $this->set('fuelingStation', $fuelingStation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuelingStation = $this->FuelingStations->newEntity();
        if ($this->request->is('post')) {
            $fuelingStation = $this->FuelingStations->patchEntity($fuelingStation, $this->request->getData());
            if ($this->FuelingStations->save($fuelingStation)) {
                $this->Flash->success(__('The fueling station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fueling station could not be saved. Please, try again.'));
        }
        $brands = $this->FuelingStations->Brands->find('list', ['limit' => 200]);
        $this->set(compact('fuelingStation', 'brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fueling Station id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuelingStation = $this->FuelingStations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuelingStation = $this->FuelingStations->patchEntity($fuelingStation, $this->request->getData());
            if ($this->FuelingStations->save($fuelingStation)) {
                $this->Flash->success(__('The fueling station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fueling station could not be saved. Please, try again.'));
        }
        $brands = $this->FuelingStations->Brands->find('list', ['limit' => 200]);
        $this->set(compact('fuelingStation', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fueling Station id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuelingStation = $this->FuelingStations->get($id);
        if ($this->FuelingStations->delete($fuelingStation)) {
            $this->Flash->success(__('The fueling station has been deleted.'));
        } else {
            $this->Flash->error(__('The fueling station could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
