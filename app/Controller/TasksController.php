<?php

App::uses('AppController', 'Controller');

/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();


// Allow users to register and logout. 
        // $this->Auth->allow('add','edit','view','delete');
    }

    public function index() {
        $this->Task->recursive = 0;
        if ($this->Auth->user('role_id') == '2') {
            $this->set('tasks', $this->Paginator->paginate('Task', array('Task.member_id ' => $this->Auth->user('member_id'))));
        } else {
            $this->set('tasks', $this->Paginator->paginate());
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            // $dados=array("title"=>"sdsdsdsd","description"=>"dd","deadline"=>"2015-01-01");

            $this->Task->create();
            $flag = $this->Task->save($this->request->data);
            if ($flag) {
                $this->Session->setFlash(__('The task has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $members = $this->Task->Member->find('list');
        $this->set(compact('members'));

        $projects = $this->Task->Project->find('list');
        $this->set(compact('projects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('The task has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
        }
        $members = $this->Task->Member->find('list');
        $this->set(compact('members'));

        $projects = $this->Task->Project->find('list');
        $this->set(compact('projects'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Task->delete()) {
            $this->Session->setFlash(__('The task has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The task could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function searchpertask($id = null) {

//             $options = array('conditions' => array('Faculty.id' => $id));
//             $faculdade=$this->Faculty->find('first', $options);
//            
//             $this->set('facul',$faculdade);

        $datesearch = array();

        $query = $this->request->data['Task']['date'];

        $conditions = array(
            'conditions' => array(
                'Task.deadline LIKE' => "%$query%"
            )
        );

        $datesearch = $this->Task->find('all', $conditions);


        $this->set('datesearch', $datesearch);
//debug($this->data);
    }

    public function searchmembertasks($id = null) {// metodo para busca de tarefas 
        //$result = array();
        $query = $this->request->data['Task']['buscador']; // recebe o parametro de pesquisa, com Modelo=Task e input-id=buscador

        $conditions = array(
            'conditions' => array(
                'Task.member_id LIKE' => "$query%"
            )
        );

        $result = $this->Task->find('all', $conditions);


        $this->set('result', $result);
//debug($this->data);
    }

    public function searchperdate($id = null) { //metodo para buscar todas tarefas por data
        //$result = array();
        $query = $this->request->data['Task']['buscador']; // recebe o parametro de pesquisa, com Modelo=Task e input-id=buscador

        $conditions = array(
            'conditions' => array(
                'Task.deadline LIKE' => "%$query%"
            )
        );

        $result = $this->Task->find('all', $conditions);


        $this->set('result', $result);
//debug($this->data);
    }

    public function searchfunctionstasks($id = null) {// Buscar 
        $var = $this->request->data['Task']['buscador'];
        $this->Task->recursive = 1;
        $this->Paginator->settings = array('conditions' => array('Member.function' => "$var"), 'limit' => 100);
        $result = $this->Paginator->paginate('Task');
        //$this->set('result', $this->Paginator->paginate());
        $this->set(compact('result'));





    }

    public function viewnrtasks($id = null) {/// metodo para buscar nr de tarefas por member com recurso a propriedade counterCache(vide tabela Task)
        $this->set('result', $this->Task->find('all', array(
                    'fields' => array(
                        'Task.member_id',
                        'COUNT(Task.member_id) as conta'
                    ),
                    'group' => 'Task.member_id'
        )));
    }

    public function getdata() {
        $data = '2015-08-28';
        $options = array('conditions' => array('Task.deadline' => $data));
        $tarefas = $this->Task->find('all', $options);

        $this->set('tarefas', $tarefas);
    }

    public function betweendatas() {
        $data1 = date('2015-08-29');
        $data2 = date('2015-12-30');
        //$conditions =  array('conditions' => array('Task.deadline' =>array('Between',$data1,$data2)));
        $cond = array('conditions' => array('Task.deadline >= ' => $data1, 'Task.deadline <= ' => $data2));

        $this->Paginator->settings = array('conditions' => array('Task.deadline >= ' => $data1, 'Task.deadline <= ' => $data2), 'limit' => 16, 'order' => 'Task.id DESC');
        $tarefas = $this->Paginator->paginate('Task');
        $this->set(compact('tarefas'));

        // $tarefas = $this->Task->find('all', $cond);
        //   $this->set('tarefas', $tarefas);
    }

    public function memberbetweendatas($id = null) {
        $data1 = date('2015-08-28');
        $data2 = date('2015-12-30');
        $options = array('conditions' => array(array('Task.member_id' => $id), array('Task.deadline >= ' => $data1, 'Task.deadline <= ' => $data2)));
//        $options = array('conditions' => array(array('Task.member_id' => $id), array('Task.deadline' => array('Between', $data2, $data1))));
        $tarefas = $this->Task->find('all', $options);

        $this->set('tarefas', $tarefas);
    }

    public function metasks() {

        $members = $this->Task->find('all', array(
            'fields' => array(
                'Task.member_id',
                'COUNT(Task.member_id) as conta'
            ),
            'group' => 'Task.member_id'
        ));

        $this->set('members', $members);
    }

}
