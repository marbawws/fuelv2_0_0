<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\I18n;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add', 'confirm', 'resendConfirmEmail']); // actions logout and add do not require auth;
        $this->Auth->deny(['index','view']);
        I18n::setLocale($this->request->session()->read('Config.language'));
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if(in_array($action, ['index'])){
            if(!$user['confirmed']){
                $this->Flash->success(__('Please confirm your email'));
                return parent::isAuthorized($user);
            }
            return true;
        }
        if(in_array($action,['delete'])){
            if($user['role_id'] == 3){
                return parent::isAuthorized($user);
            } elseif ($user['role_id'] == 2){
                return true;
            }
        }
        // All other actions require an id.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            $this->Flash->error(__('missing parameter'));
            return false;
        }
        /*debug($id);
        debug($user);
        die();*/
        if($id == $user['id']){
            return true;
        } else{
            return parent::isAuthorized($user);
        }
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                if(!$user['confirmed']){
                    $this->Flash->success(__('please confirm your email to access users\' list'));
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect');
        }
    }

    public function logout(){
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Transactions'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->uuid = Text::uuid();
            $user->confirmed = false;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->sendConfirmEmail($user);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function sendConfirmEmail($user){
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->getAttribute('webroot') . "users/confirm/" . $user->uuid;
        $email = new Email('default');
        $email->setTo($user->email)
            ->setSubject(__('confirmer votre compte'))
            ->Send($confirmation_link);
    }
    public function confirm($uuid){
        $user = $this->Users->findByUuid($uuid)->firstOrFail();
        $user->confirmed= true;
        if($this->Users->save($user)){
            $this->Flash->success(__('Thank you') . '. ' . __('Your email has been confirmed'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('the confirmation could not be saved. Please try again.'));
    }
}
