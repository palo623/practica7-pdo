<?php
// Controlador: elimina un videojoc per ID

require_once '../config/db.php';
require_once '../model/videojoc_db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    esborrarJoc($pdo, $id);
}

header('Location: ../views/llista.php');
exit;
?>
