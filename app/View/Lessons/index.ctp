<?php

echo $this->Html->link('add', array('controller' => 'lessons', 'action' => 'add'),
    array('class' => 'material-icons medium'));
?>
<table>
    <thead>
    <tr>
        <th>Action</th>
        <th>Unité d'ensignement</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lessons as $lesson): ?>
        <tr>
            <td>
                <?php
                echo $this->Html->link('edit', array('controller' => 'lessons', 'action' => 'edit', $lesson['Lesson']['id']),
                    array('class' => 'material-icons'));
                echo $this->Form->postLink(
                    'delete_forever',
                    array('action' => 'delete', $lesson['Lesson']['id']),
                    array('confirm' => 'Etes-vous sur de supprimer cette unité d\'enseignement ?','class'=>'material-icons'));
//
                ?>
            </td>
            <td><?php echo $lesson['Lesson']['libelle'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




