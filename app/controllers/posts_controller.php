<?php
class PostsController extends AppController {
    var $name = 'Posts';

    function reply($id = null) {
	$this->autoRender = false;
	if ($this->data) {
	    $this->data['Post']['user_id'] = $this->Auth->user('id');
	    if ($this->Post->save($this->data)) {
		$this->redirect(array(
			'controller'=>'topics',
			'action'=>'view',
			$this->data['Post']['topic_id']),
		    null, true);
	    }
	} 
    }

    function edit($id) {
	if (!empty($this->data)) {
	    if ($this->Post->save($this->data)) {
		$this->redirect(array(
		    'controller'=>'topics',
		    'action'=>'view',
		    $this->data['Post']['topic_id']),
		    null, true);
	    }
	}
	$this->Post->id = $id;
	$this->data = $this->Post->read();
    }

    function delete($id) {
	$this->Post->id=$id;
	$topicId = $this->Post->field('topic_id');
	$this->Post->delete();
	$this->redirect(array('controller'=>'topics',
	    'action'=>'view',$topicId),null,true);
    }

    function isAuthorized() {
	$userId = $this->Auth->user('id');
	$aro = array('model' => 'User', 'foreign_key' => $userId);
	$role = 'forum/mod/user';
	// Require "mod" role for editing other's posts
	switch ($this->action) {
	case 'delete':
	case 'edit':
	    $this->Post->id = $this->params['pass'][0];
	    $ownerId = $this->Post->field('user_id');
	    if ($ownerId != $userId) $role = 'forum/mod';
	    break;
	}
	return $this->Acl->check($aro, $role, '*');
    } 
}
?>
