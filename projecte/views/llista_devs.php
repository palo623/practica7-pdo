<?php
require_once '../config/db.php';
require_once '../model/desenvolupador_db.php';

$devs = obtenirTotsElsDevs($pdo);

include 'header.php';
?>

<h2>Llistat de Desenvolupadors</h2>

<p><a href="formulari_dev.php" style="color:#27ae60; font-weight:bold;">+ Nou Desenvolupador</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>País</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devs as $dev): ?>
        <tr>
            <td><?= htmlspecialchars($dev['id']) ?></td>
            <td><?= htmlspecialchars($dev['nom']) ?></td>
            <td><?= htmlspecialchars($dev['pais'] ?? '—') ?></td>
            <td>
                <a class="btn-perill" href="../actions/esborrar_dev.php?id=<?= $dev['id'] ?>"
                   onclick="return confirm('Segur que vols eliminar aquest desenvolupador?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
