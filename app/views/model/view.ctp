<h1>Gato</h1>
<?php
$mfui->setModel($model, 'Gato');
echo $mfui->editor2('tx_nombre_gato');
echo $mfui->editor2('tx_numero_chip');
echo $mfui->editor2('fx_nacimiento');
echo $mfui->collectionEditor('sexo', array(301=>'hembra',302=>'macho'));
echo $mfui->editor2('tx_raza');
echo $mfui->editor2('tx_pelaje');
echo $mfui->editor2('responsable_seguimientos_id');
echo $mfui->editor2('tx_procedencia');
?>
