<?php
class UsersController extends AppController {
    var $name = 'Users';
    var $scaffold;

    function login() {
	// implemented by AuthComponent
    }

    function logout() {
	$this->redirect($this->Auth->logout());
    }

    function promoteToModerator($userId) {
	$aro = array('model'=>'User', 'foreign_key'=>$userId);
	$this->Acl->grant($aro, 'forum/mod', '*');
	$this->Session->setFlash('User promoted to moderator');
	$this->redirect(array('action'=>'index'));
    }

    function isAuthorized() {
	$userId = $this->Auth->user('id');
	$aro = array('model' => 'User', 'foreign_key' => $userId);
	// Require "admin" role for anything that's not explicitely allowed
	$role = 'forum/admin';
	return $this->Acl->check($aro, $role, '*');
    } 
}
?>
