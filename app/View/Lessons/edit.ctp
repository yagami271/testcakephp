<h1>Mettre à jour une unité d'enseignement</h1>
<?php
echo $this->Form->create('Lesson');
echo $this->Form->input('libelle');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Sauvegarder');
?>




