<h2>
<span class="title-nav">
<?php echo $html->link($topic['Forum']['name'], array(
    'controller' => 'forums',
    'action'=>'view',$topic['Topic']['forum_id']
    ));
?>
 &raquo;
</span>
<?php echo $topic['Topic']['title'] ?>
</h2>

<?php
$post = array_shift($topic['Posts']);
if (empty($post)):
    echo "No posts in this topic. This shouldn't happen.";
else:
?>
<div class="topicleader">
<div class="postmeta">
<?php
if (empty($post['Poster'])) {
    echo 'Guest';
} else {
    echo $html->link($post['Poster']['username'],
	array('controller'=>'users','action'=>'view',
	$post['Poster']['id']));
}
?>
 &mdash; 
<?php echo $post['created'] ?>
<div class="actions">
<ul>
<li>
<?php 
echo $html->link('Edit topic',array('controller'=>'topics',
    'action'=>'edit', $post['topic_id']));
?>
</li>
<li>
<?php
echo $html->link('Delete topic',array('controller'=>'topics',
    'action'=>'delete', $post['topic_id']),
    array('confirm'=>'Are you sure you want to delete this topic?'));
?>
</li>
</ul>
</div>
</div>
<div class="posttext"><?php echo h($post['post_text']) ?></div>
</div>
<?php endif; ?>

<div class="postlist">
<?php if (empty($topic['Posts'])): ?>
<p>No replies in this topic.</p>
<?php else: ?>
<?php foreach ($topic['Posts'] as $post):?>
<div class="post">
<div class="postmeta">
<?php
if (empty($post['Poster'])) {
    echo 'Guest';
} else {
    echo $html->link($post['Poster']['username'],
	array('controller'=>'users','action'=>'view',
	$post['Poster']['id']));
}
?>
 &mdash; 
<?php echo $post['created'] ?>
<div class="actions">
<ul>
<li>
<?php 
echo $html->link('Edit post',array('controller'=>'posts',
    'action'=>'edit', $post['id']));
?>
</li>
<li>
<?php
echo $html->link('Delete post',array('controller'=>'posts',
    'action'=>'delete', $post['id']),
    array('confirm'=>'Are you sure you want to delete this post?'));
?>
</li>
</ul>
</div>
</div>
<div class="posttext"><?php echo h($post['post_text']) ?></div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<h3>Your reply</h3>
<?php
echo $form->create('Post', array('controller'=>'posts','action'=>'reply'));
echo $form->hidden('topic_id', array('value'=>$topic['Topic']['id']));
echo $form->input('post_text', array('type'=>'textarea', 'label'=>false));
echo $form->end('Save');
?>
