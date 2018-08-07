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
            <td><?php echo $this->Html->link('edit',
                    array('controller' => 'students', 'action' => 'view', $student['Student']['id'])); ?></td>
            <td><?php echo $student['Student']['nom'] ?></td>
            <td><?php echo $student['Student']['prenom'] ?></td>
            <td><?php echo $student['Student']['date_naissance'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




