<?php
class User extends AppModel {
    var $name='User';
    var $hasMany = array (
	'Topics' => array ('className'=>'Topic'),
	'Posts' => array ('className'=>'Post'),
    );

    var $actsAs = array('Acl'=>array ('type' => 'requester'));

    function parentNode() {
	return 'forum-users';
    }
}
?>
