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
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?php
                echo $this->Html->link('edit', array('controller' => 'students', 'action' => 'edit', $student['Student']['id']),
                    array('class' => 'material-icons'));
                echo $this->Form->postLink(
                    'delete_forever',
                    array('action' => 'delete', $student['Student']['id']),
                    array('confirm' => 'Etes-vous sur de supprimer cette étudiant ?','class'=>'material-icons'));

//
                ?>
            </td>
            <td><?php echo $student['Student']['nom'] ?></td>
            <td><?php echo $student['Student']['prenom'] ?></td>
            <td><?php echo $student['Student']['date_naissance'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




