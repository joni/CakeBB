<?php
class TopicsController extends AppController {

    function add($forumId) {
	if (!empty($this->data)) {
	    if ($this->Topic->saveAll($this->data)) {
		$this->redirect(array('action'=>'view', 
		    $this->Topic->id),
		null, true);
	    }
	}
	$this->Topic->Forum->id = $forumId;
	$forum = $this->Topic->Forum->read();
	$this->set(compact('forum'));
	$this->data['Forum']['id'] = $forumId;
    }

    function view($id) {
	$this->Topic->id = $id;
	$topic = $this->Topic->find('first', array(
	    'conditions'=>array('Topic.id' => $id),
	    'contain'=>array(
		'Posts'=>array(
		    'Poster.username'
		),
		'Forum.name',
	    )));

	$this->set(compact('topic'));
    }

    function edit($id) {
	if (!empty($this->data)) {
	    if ($this->Topic->saveAll($this->data)) {
		$this->redirect(array(
		    'action'=>'view',$id),null,true);
	    }
	}
	$this->Topic->id = $id;
	$this->data = $this->Topic->read();
	$forums = $this->Topic->Forum->find('list');
	$this->set(compact('forums'));
    }

    function delete($id) {
	$this->Topic->id=$id;
	$forumId = $this->Topic->field('forum_id');
	$this->Topic->delete();
	$this->redirect(array('controller'=>'forums',
	    'action'=>'view',$forumId),null,true);
    }
}
?>
