<h1>Ajouter un étudiant</h1>
<?php
echo $this->Form->create('Student');
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('date_naissance', array(
    'dateFormat' => 'DMY',
    'empty' => true,
    'minYear' => date('Y') - 80,
    'maxYear' => date('Y') - 18));
echo $this->Form->end('Sauvegarder');
?>




