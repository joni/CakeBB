<?php
class Topic extends AppModel {
    var $actsAs = array ('Containable');
    var $belongsTo = array (
	'Forum' => array (
	    'className' => 'Forum',
	),
    );

    var $hasMany = array (
	'Posts' => array (
	    'className' => 'Post',
	    'order' => 'Posts.created',
	    'cascade' => true,
	),
    );
}
?>
