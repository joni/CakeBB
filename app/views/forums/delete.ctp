<h2>Delete forum</h2>

<?php
unset($forums[$this->data['Forum']['id']]);
echo $form->create('Forum');
echo $form->hidden('id');
echo $form->input('new_id', array('label'=>'Move topics to','type'=>'select','options'=>$forums));
echo $form->end('Delete forum');
?>
