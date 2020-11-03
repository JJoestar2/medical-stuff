<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Medicine Controller
 *
 * @property \App\Model\Table\MedicineTable $Medicine
 * @method \App\Model\Entity\Medicine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicineController extends AppController
{
    public function beforeFilter(EventInterface $event) 
    {
        $this->viewBuilder()->setLayout('manager');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];

        $medicine = $this->paginate($this->Medicine);

        $this->set(compact('medicine'));
    }

    /**
     * View method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicine = $this->Medicine->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set('medicine', $medicine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicine = $this->Medicine->newEmptyEntity();
        if ($this->request->is('post')) {
            $medicine = $this->Medicine->patchEntity($medicine, $this->request->getData());
            if ($this->Medicine->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $categories = $this->Medicine->Categories->find('list', ['limit' => 200]);
        $this->set(compact('medicine', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicine = $this->Medicine->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicine = $this->Medicine->patchEntity($medicine, $this->request->getData());
            if ($this->Medicine->save($medicine)) {
                $this->Flash->success(__('The medicine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicine could not be saved. Please, try again.'));
        }
        $categories = $this->Medicine->Categories->find('list', ['limit' => 200]);
        $this->set(compact('medicine', 'categories'));
    }
}
