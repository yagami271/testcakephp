<?php
echo $this->Html->link('keyboard_backspace', array('controller' => 'students', 'action' => 'index'),
    array('class' => 'material-icons','title'=>'Modifier cet étudiant '));
?>
<h1>La liste des notes de <b><?php echo $notes[0]['Student']['prenom'].' '. $notes[0]['Student']['nom'] ?> </b> </h1>
<table>
    <thead>
    <tr>
        <th>Unité d'enseignement</th>
        <th>Note</th>
        <th>Date Attribution</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($notes as $note): ?>
        <tr>
            <td><?php echo $note['Lesson']['libelle'] ?></td>
            <td><?php echo $note['Mark']['note'] ?></td>
            <td><?php echo  $this->Time->format($note['Mark']['created'],'%d-%m-%Y') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




