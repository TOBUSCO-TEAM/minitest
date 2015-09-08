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

//    public $paginate = array(
//        'limit' => 25,
//        'order' => array(
//            'Member.name' => 'asc'
//        )
//    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Member->recursive = 0;
		$this->set('members', $this->Member->find('all',array('order' => array('Member.name' => 'asc'))));
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
        
        public function viewnrtasks($id=null){
            
//             $options = array('conditions' => array('Faculty.id' => $id));
//             $faculdade=$this->Faculty->find('first', $options);
//            
//             $this->set('facul',$faculdade);
            
        $this->loadModel('Task'); //Chamando um modelo alheio a este controller
        $tasks = array(); //array de nr de nr de tarefas a cada membro
        $members = $this->Member->find('all'); //buscando membros
        foreach ($members as $member): //percorrendo membros
        $rowCount = $this->Task->find( //contagem de membros associados a uma tarefa
       'count', array(
        'conditions' => array(
         'Task.member_id' => h($member['Member']['id']) //condicao de contagem
      )
   )
);
        array_push($tasks, $rowCount); //inserindo no array
            endforeach;
            
            $datesearch = array();

    $query = $this->request->data['Task']['date'];

    $conditions = array(
        'conditions' => array(
                'Task.deadline LIKE' => "%$query%"
        )
    );

    $datesearch = $this->Task->find('all', $conditions);
        

$this->set('datesearch', $tasks);
//debug($this->data);
            
        }
}
