<h2>
<span class="title-nav">
<?php echo $html->link('Forums',
    array ('controller'=>'forums', 'action'=>'index')); ?>
 &raquo; 
<?php echo $html->link($forum['Forum']['name'],
    array ('controller'=>'forums', 'action'=>'view',
    $forum['Forum']['id'])); ?>
 &raquo; 
</span>
New Topic
</h2>
<?php
echo $form->create('Topic');
echo $form->hidden('Forum.id');
echo $form->input('Topic.title');
echo $form->input('Posts.0.post_text', array ('type'=>'textarea'));
echo $form->end('Post topic');
?>
