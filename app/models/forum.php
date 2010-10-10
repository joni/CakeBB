<?php
class Forum extends AppModel {
    var $actsAs = array ('Containable');
    var $hasMany = array (
	'Topics' => array (
	    'className' => 'Topic',
	    'limit'	=> 20,
	)
    );
}
?>
