<h1>La liste des notes de <b><?php echo $notes[0]['Student']['prenom'].' '. $notes[0]['Student']['prenom'] ?> </b> </h1>
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
            <td><?php echo $note['Mark']['created'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>




