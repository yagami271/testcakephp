<?php

echo $this->Html->link('add', array('controller' => 'students', 'action' => 'add'),
    array('class' => 'material-icons medium'));
?>
<table>
    <thead>
    <tr>
        <th>Action</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date naissance</th>
        <th>Afficher les notes</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?php
                echo $this->Html->link('edit', array('controller' => 'students', 'action' => 'edit', $student['Student']['id']),
                    array('class' => 'material-icons','title'=>'Modifier cet étudiant '));
                echo $this->Form->postLink(
                    'delete_forever',
                    array('action' => 'delete', $student['Student']['id']),
                    array('confirm' => 'Etes-vous sur de supprimer cette étudiant ?','class'=>'material-icons','title'=>'Supprimer ce étudiant'));

                  echo $this->Html->link('add_circle', array('controller' => 'marks', 'action' => 'attribute', $student['Student']['id']),
                    array('class' => 'material-icons','title'=>'Attribuer une note à cet étudiant'));
                ?>

            </td>
            <td><?php echo $student['Student']['nom'] ?></td>
            <td><?php echo $student['Student']['prenom'] ?></td>
            <td><?php echo $this->Time->format($student['Student']['date_naissance'],'%d-%m-%Y') ?></td>
            <td><?php  echo $this->Html->link('list_alt', array('controller' => 'marks', 'action' => 'notes', $student['Student']['id']),
                    array('class' => 'material-icons','title'=>'Afficher les notes de cet étudiant ')); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




