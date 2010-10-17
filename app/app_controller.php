<?php
class AppController extends Controller {
    var $components = array ('Auth', 'Acl', 'Session');

    function beforeFilter() {
	$this->Auth->allow('index', 'view');
	$this->Auth->authorize = 'controller';
    }
}
?>
