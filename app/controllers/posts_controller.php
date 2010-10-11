<?php
class PostsController extends AppController {
    var $name = 'Posts';

    function reply($id = null) {
	$this->autoRender = false;
	if ($this->data) {
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
}
?>
