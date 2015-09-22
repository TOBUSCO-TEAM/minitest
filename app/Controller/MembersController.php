<?php

App::uses('AppController', 'Controller');

/**
 * Members Controller
 *
 * @property Member $Member
 * @property PaginatorComponent $Paginator
 */
class MembersController extends AppController {

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
$this->Auth->allow('view','index'); 
        } 
     
    
    public function index() {
        $this->Member->recursive = 0;
        $this->set('members', $this->Member->find('all', array('order' => array('Member.name' => 'asc'))));//lista os membros de forma ascendente de nomes
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
        $this->set('member', $this->Member->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Member->create();
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
            $this->request->data = $this->Member->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Member->delete()) {
            $this->Session->setFlash(__('The member has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The member could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function viewnrtasks($id = null) {/// metodo para buscar nr de tarefas por membro com recurso a propriedade counterCache(vide tabela Task)
      $this->set('members', $this->Member->find('all'));
      
      
      //             $options = array('conditions' => array('Faculty.id' => $id));
//             $faculdade=$this->Faculty->find('first', $options);
//            
//             $this->set('facul',$faculdade);
//        $this->loadModel('Task'); //Chamando um modelo alheio a este controller
//        $tasks = array(); //array de nr de nr de tarefas a cada membro
//        $memb = array();
//        $members = $this->Member->find('all'); //buscando membros
//        foreach ($members as $member): //percorrendo membros
//            $rowCount = $this->Task->find(//contagem de membros associados a uma tarefa
//                    'count', array(
//                'conditions' => array(
//                    'Task.member_id' => h($member['Member']['id']) //condicao de contagem
//                )
//                    )
//            );
//
//            array_push($memb, h($member['Member']['name']));
//
//            array_push($tasks, $rowCount); //inserindo no array
//        endforeach;
//
//        $tudo = array('members' => $memb, 'nrtasks' => $tasks);
//        $this->set('members', $tudo);
        //$this->set('tasks', $tasks);

    }

    public function searchfunctiontasks($id = null) {// metodo que busca membros que desempenham um determinado cargo e tem ou nao tem tarefas
        //$result = array();
        //$this->loadModel('Task');

        $query = $this->request->data['Member']['opcoes']; //parametro do select
        $query1 = $this->request->data['Member']['buscador'];// parametro do campo de texto
        if($query==0){      
        $conditions = array(
            'conditions' => array(
                'AND' => array(
                    'OR'=>array(
                        'Member.task_count'=>0,
                        'Member.task_count is null',),
                     //Nota: campo adicionado na base de dados para uso do counterCache
                    'Member.function LIKE'=>"%$query1%"
                )
                 
            )
        );
        } else {
            $conditions = array(
            'conditions' => array(
                'AND' => array(
                    'Member.task_count >' => 0,
                    'Member.function LIKE'=>"%$query1%"
                )
                 
            )
        );
        }

        $result = $this->Member->find('all', $conditions);


        $this->set('result', $result);
//debug($this->data);
    }
    



//debug($this->data);
    }


