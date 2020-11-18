<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 *
 * @method \App\Model\Entity\Brand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $brands = $this->Brands->find('all');
        $this->set([
            'brands' => $brands,
            '_serialize' => ['brands']
        ]);
    }

    public function view($id)
    {
        $brand = $this->Brands->get($id);
        $this->set([
            'brand' => $brand,
            '_serialize' => ['brand']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $brand = $this->Brands->newEntity($this->request->getData());
        if ($this->Brands->save($brand)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'brand' => $brand,
            '_serialize' => ['message', 'brand']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $brand = $this->Brands->get($id);
        $brand = $this->Brands->patchEntity($brand, $this->request->getData());
        if ($this->Brands->save($brand)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $brand = $this->Brands->get($id);
        $message = 'Deleted';
        if (!$this->Brands->delete($brand)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}
