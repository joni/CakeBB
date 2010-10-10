<?php
class ForumsController extends AppController {

    function index() {
	$forums = $this->Forum->find('all',array(
	    'contain'=>array()
	));
	$this->set(compact('forums'));
    }

    function add() {
	if (!empty($this->data)) {
	    if ($this->Forum->save($this->data)) {
		$this->Session->setFlash("The forum has been created");
		$this->redirect(array('action'=>'view',
		    $this->Forum->id), null, true);
	    } else {
		$this->Session->setFlash("There was an error saving the new forum. Try again!");
	    }
	}
    }

    function view($id) {
	$this->Forum->id = $id;
	$forum = $this->Forum->find('first',
	    array(
		'conditions' => array (
		    'id'=>$id
		),
		'contain'=>array(
		    'Topics' => array (
			'User.username',
			'id',
			'title',
			'created',
		    ),
		),
	    ));
	$this->set(compact('forum'));
    }

    function delete($id=null) {
	if (!empty($this->data)) {
	    $newId = $this->data['Forum']['new_id'];
	    $oldId = $this->data['Forum']['id'];
	    $this->Forum->Topics->updateAll(
		array('forum_id'=>$newId),
		array('forum_id'=>$oldId));
	    $this->Forum->id = $oldId;
	    $this->Forum->delete();
	    $this->redirect(array('action'=>'view',$newId),
		null,true);
	}
	$forums=$this->Forum->find('list');
	unset($forums[$id]);
	$this->set(compact('forums'));
	$this->data['Forum']['id'] = $id;
    }

    function edit($id=null) {
	if (!empty($this->data)) {
	    if ($this->Forum->save($this->data)) {
		$this->redirect(array('action'=>'view',
		    $this->Forum->id),null,true);
	    }
	}
	$this->Forum->id = $id;
	$this->data = $this->Forum->read();
    }
}
?>
