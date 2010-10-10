<h2>
<?php echo $forum['Forum']['name']; ?></h2>

<p><?php echo $forum['Forum']['description']; ?></h2>

<div class="topiclist">
<?php if (empty($forum['Topics'])): ?>
<p>No topics. Start a new one!</p>
<?php else: ?>
<?php foreach ($forum['Topics'] as $topic): ?>
<div class="topic">
<div class="topictext">
<?php 
echo $html->link($topic['title'], array(
    'controller'=>'topics','action'=>'view',$topic['id'])); 
?>
</div>
<div class="topicmeta">
<?php
if (empty($topic['User'])) {
    echo 'Guest';
} else {
    echo $html->link($topic['User']['username'],array(
	'controller'=>'users','action'=>'view',
	$topic['user_id']));
}
?>
 &mdash; 
<?php echo $topic['created']; ?>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

<div class="actions">
<ul>
<li>
<?php echo $html->link('Edit Forum', array (
    'action'=>'edit', $forum['Forum']['id'])); 
?>
</li>
<li>
<?php echo $html->link('Delete forum', array (
    'action'=>'delete', $forum['Forum']['id']),
    array('confirm'=>'Are you sure you want to delete this forum?')
); 
?>
</li>
<li>
<?php echo $html->link('New topic', array (
    'controller'=>'topics','action'=>'add',
    $forum['Forum']['id'])); 
?>
</li>
</ul>
</div>
