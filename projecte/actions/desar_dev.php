<?php
// Controlador: gestiona la creació d'un nou desenvolupador

require_once '../config/db.php';
require_once '../model/desenvolupador_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom  = trim($_POST['nom']);
    $pais = trim($_POST['pais']);

    insertarDev($pdo, $nom, $pais);

    header('Location: ../views/llista_devs.php');
    exit;
}

header('Location: ../views/llista_devs.php');
exit;
?>
