<?php
// Controlador: elimina un desenvolupador per ID

require_once '../config/db.php';
require_once '../model/desenvolupador_db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    esborrarDev($pdo, $id);
}

header('Location: ../views/llista_devs.php');
exit;
?>
