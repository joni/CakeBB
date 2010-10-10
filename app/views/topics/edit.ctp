<h2>Edit topic</h2>
<?php
echo $form->create('Topic');
echo $form->hidden('id');
echo $form->input('forum_id');
echo $form->input('title');
echo $form->input('Posts.0.id');
echo $form->input('Posts.0.post_text');
echo $form->end('Save');
?>
