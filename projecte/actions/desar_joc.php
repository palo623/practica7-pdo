<?php
// Controlador: gestiona la creació i edició de videojocs
// Rep les dades del formulari via POST, executa la consulta SQL i redirigeix

require_once '../config/db.php';
require_once '../model/videojoc_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recollim i sanejem les dades del formulari
    $id               = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $titol            = trim($_POST['titol']);
    $genere           = trim($_POST['genere']);
    $preu             = (float)$_POST['preu'];
    $data_llancament  = $_POST['data_llancament'];
    $desenvolupador_id = !empty($_POST['desenvolupador_id']) ? (int)$_POST['desenvolupador_id'] : null;

    if ($id) {
        // Si existeix ID → és una edició (UPDATE)
        actualitzarJoc($pdo, $id, $titol, $genere, $preu, $data_llancament, $desenvolupador_id);
    } else {
        // Si no hi ha ID → és una creació nova (INSERT)
        insertarJoc($pdo, $titol, $genere, $preu, $data_llancament, $desenvolupador_id);
    }

    // Redirigim a la llista de jocs un cop desat
    header('Location: ../views/llista.php');
    exit;
}

// Si s'accedeix directament sense POST, redirigim
header('Location: ../views/llista.php');
exit;
?>
