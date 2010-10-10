<?php
class Post extends AppModel {
    var $belongsTo = array (
	'Topic' => array (
	    'className' => 'topic',
	),
    );
}
?>
