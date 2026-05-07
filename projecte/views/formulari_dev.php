<?php
include 'header.php';
?>

<h2>Afegir un nou Desenvolupador</h2>

<form action="../actions/desar_dev.php" method="POST">
    <div class="form-group">
        <label for="nom">Nom del Desenvolupador:</label>
        <input type="text" id="nom" name="nom" placeholder="Ex: Nintendo" required>
    </div>

    <div class="form-group">
        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" placeholder="Ex: Japó">
    </div>

    <button type="submit">Afegir Desenvolupador</button>
    <br><br>
    <a href="llista_devs.php" style="display:block; text-align:center; color:#666;">Cancel·lar</a>
</form>

<?php include 'footer.php'; ?>
