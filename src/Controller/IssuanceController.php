<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Issuance Controller
 *
 * @property \App\Model\Table\IssuanceTable $Issuance
 * @method \App\Model\Entity\Issuance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IssuanceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'Users', 'Medicine'],
        ];

        $userID = $this->getRequest()->getSession()->read('Auth.User.ID');  

        $records =  $this->Issuance->find('all', array(
            'conditions' => "Issuance.user_id = $userID",
            'contain' => array(
                'Departments', 
                'Users', 
                'Medicine'
            )
        ));
        $issuance = $this->paginate($records);

        $this->set(compact('issuance'));
    }

    /**
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function viewAll() 
    {
        $this->viewBuilder()->setLayout('manager');

        $this->paginate = [
            'contain' => ['Departments', 'Users', 'Medicine'],
        ];

        $issuance = $this->paginate($this->Issuance);

        $this->set(compact('issuance'));
    }

    /**
     * View method
     *
     * @param string|null $id Issuance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issuance = $this->Issuance->get($id, [
            'contain' => ['Departments', 'Users', 'Medicine'],
        ]);

        $this->set(compact('issuance'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issuance = $this->Issuance->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $userData = $this->getRequest()->getSession()->read('Auth.User');

            $newRecord = $this->Issuance->createRecord($userData , $data);

            if($newRecord['store_previous'] <= 0) {
                $this->Flash->error(__('Закінчилось лікарство.'));
                return $this->redirect(['action' => 'index']);
            } elseif($newRecord['store_previous'] < $newRecord['count']) {
                $this->Flash->error(__('Недостатня к-ть на складі.'));
                return $this->redirect(['action' => 'index']);
            }

            $issuance = $this->Issuance->patchEntity($issuance, $newRecord);
            if ($this->Issuance->save($issuance)) {
                $this->Issuance->Medicine->Store->updateCount($data);
                $this->Flash->success(__('The issuance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issuance could not be saved. Please, try again.'));
        }
        $medicines = $this->Issuance->Medicine->find('list', ['limit' => 200]);
        $this->set(compact('issuance', 'medicines'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issuance = $this->Issuance->get($id);
        if ($this->Issuance->delete($issuance)) {
            $this->Flash->success(__('The issuance has been deleted.'));
        } else {
            $this->Flash->error(__('The issuance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'viewAll']);
    }

    public function deleteAll() 
    {
        $this->request->allowMethod(['post', 'delete']);
        $ids = $this->request->getData('ids');
        if($ids) {

            if($this->Issuance->deleteAll(['Issuance.ID IN' => $ids])) $this->Flash->success('Обрані записи було видалено');
        } else {
            $this->Flash->error(__('Ви не вибрали запис(и)!'));
        }
        
        return $this->redirect(['action'=> 'viewAll']);
    }
}
