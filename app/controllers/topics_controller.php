<?php
class TopicsController extends AppController {

    function add($forumId) {
	if (!empty($this->data)) {
	    $this->data['Topic']['user_id'] = $this->Auth->user('id');
	    $this->data['Posts'][0]['user_id'] = $this->Auth->user('id');
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
		    'User' => array('id', 'username'),
		),
		'User' => array('id', 'username'),
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

    function isAuthorized() {
	// Require "mod" role for editing other's topics
	$userId = $this->Auth->user('id');
	$aro = array('model' => 'User', 'foreign_key' => $userId);
	$role = 'forum/mod/user';
	switch ($this->action) {
	case 'delete':
	case 'edit':
	    $this->Topic->id = $this->params['pass'][0];
	    $ownerId = $this->Topic->field('user_id');
	    if ($ownerId != $userId) $role = 'forum/mod';
	}
	return $this->Acl->check($aro, $role, '*');
    } 
}
?>
