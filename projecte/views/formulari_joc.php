<?php
require_once '../config/db.php';
require_once '../model/videojoc_db.php';
require_once '../model/desenvolupador_db.php';

// Si hi ha un ID per GET, estem en mode edició
$joc = null;
if (isset($_GET['id'])) {
    $joc = obtenirJocPerId($pdo, (int)$_GET['id']);
}

$devs = obtenirTotsElsDevs($pdo);
$editant = $joc !== null;

include 'header.php';
?>

<h2><?= $editant ? 'Editar: ' . htmlspecialchars($joc['titol']) : 'Afegir un nou videojoc' ?></h2>

<form action="../actions/desar_joc.php" method="POST">
    <?php if ($editant): ?>
        <input type="hidden" name="id" value="<?= $joc['id'] ?>">
    <?php endif; ?>

    <div class="form-group">
        <label for="titol">Títol del Videojoc:</label>
        <input type="text" id="titol" name="titol" placeholder="Ex: Elden Ring"
               value="<?= $editant ? htmlspecialchars($joc['titol']) : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="genere">Gènere:</label>
        <input type="text" id="genere" name="genere" placeholder="Ex: RPG, Acció..."
               value="<?= $editant ? htmlspecialchars($joc['genere']) : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="preu">Preu (€):</label>
        <input type="number" id="preu" name="preu" step="0.01" min="0"
               value="<?= $editant ? htmlspecialchars($joc['preu']) : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="data_llancament">Data de Llançament:</label>
        <input type="date" id="data_llancament" name="data_llancament"
               value="<?= $editant ? htmlspecialchars($joc['data_llancament']) : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="desenvolupador_id">Desenvolupador:</label>
        <select id="desenvolupador_id" name="desenvolupador_id">
            <option value="">-- Selecciona un desenvolupador --</option>
            <?php foreach ($devs as $dev): ?>
                <option value="<?= $dev['id'] ?>"
                    <?= ($editant && $joc['desenvolupador_id'] == $dev['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($dev['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit"><?= $editant ? 'Guardar Canvis' : 'Crear Videojoc' ?></button>
    <br><br>
    <a href="llista.php" style="display:block; text-align:center; color:#666;">Cancel·lar</a>
</form>

<?php include 'footer.php'; ?>
