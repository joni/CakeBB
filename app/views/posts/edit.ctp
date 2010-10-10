<h2>Edit post</h2>
<?php
echo $form->create('Post');
echo $form->hidden('id');
echo $form->hidden('topic_id');
echo $form->input('post_text');
echo $form->end('Save');
?>
