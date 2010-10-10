<h2>Forums</h2>

<?php if (empty($forums)): ?>
<p>No forums found!</p>
<?php else: ?>
<?php foreach ($forums as $f): ?>
<div class="forum">
<div class="forumtitle">
<?php
    $forum = $f['Forum'];
    echo $html->link($forum['name'], array ('action'=>'view',$forum['id']));
?>
</div>
<div class="forumdesc">
<?php
    echo $forum['description'];
?>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<div class="actions">
    <ul>
	<li><?php echo $html->link('Create a forum', array('action'=>'add')); ?></li>
    </ul>
</div>
