<h2>Edit forum</h2>
<?php
echo $form->create('Forum');
echo $form->input('name');
echo $form->input('description');
echo $form->end('Save');
?>
