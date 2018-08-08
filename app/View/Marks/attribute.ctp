<?php
echo $this->Html->link('keyboard_backspace', array('controller' => 'students', 'action' => 'index'),
    array('class' => 'material-icons','title'=>'Modifier cet étudiant '));
?>
<h1>Attribuer une note à <b><?php echo $student['Student']['prenom'].' '. $student['Student']['nom'] ?></b> </h1>
<?php
echo $this->Form->create('Mark');
echo $this->Form->input('lesson_id', array(
    'options' =>$lessons,
    'empty' => 'choisissez...'
));
echo $this->Form->input('note',array(
  'type' => 'number',
  'min' => 0,
  'max' => 20
));
echo $this->Form->input('student_id', array('type' => 'hidden','default'=>$student['Student']['id']));
echo $this->Form->end('Sauvegarder');
?>




