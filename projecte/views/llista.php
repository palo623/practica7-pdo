<?php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';

$jocs = obtenirTotsElsJocs($pdo);

include 'header.php';
?>

<h2>Catàleg complet de videojocs</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Títol</th>
            <th>Gènere</th>
            <th>Preu</th>
            <th>Llançament</th>
            <th>Desenvolupador</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jocs as $joc): ?>
        <tr>
            <td><?= htmlspecialchars($joc['id']) ?></td>
            <td><?= htmlspecialchars($joc['titol']) ?></td>
            <td><?= htmlspecialchars($joc['genere']) ?></td>
            <td><?= number_format($joc['preu'], 2) ?> €</td>
            <td><?= htmlspecialchars(date('d/m/Y', strtotime($joc['data_llancament']))) ?></td>
            <td>
                <?php if ($joc['nom_dev']): ?>
                    <span class="badge"><?= htmlspecialchars($joc['nom_dev']) ?></span>
                <?php else: ?>
                    <span style="color:#999;">No assignat</span>
                <?php endif; ?>
            </td>
            <td>
                <a class="btn-editar" href="formulari_joc.php?id=<?= $joc['id'] ?>">Editar</a>
                <a class="btn-perill" href="../actions/esborrar_joc.php?id=<?= $joc['id'] ?>"
                   onclick="return confirm('Segur que vols eliminar aquest joc?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
