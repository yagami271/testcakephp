<?php
echo $this->Html->link('keyboard_backspace', array('controller' => 'students', 'action' => 'index'),
    array('class' => 'material-icons','title'=>'Modifier cet étudiant '));
?>
<h1>Mise à jour  un étudiant</h1>
<?php
echo $this->Form->create('Student');
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('date_naissance',
    array(
        'dateFormat' => 'DMY',
        'empty' => true,
        'minYear' => date('Y') - 80,
        'maxYear' => date('Y') - 18));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Sauvegarder');
?>




