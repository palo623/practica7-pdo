<?php

// Retorna tots els desenvolupadors
function obtenirTotsElsDevs($pdo) {
    $sql = "SELECT * FROM desenvolupador ORDER BY nom ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Insereix un nou desenvolupador
function insertarDev($pdo, $nom, $pais) {
    $sql = "INSERT INTO desenvolupador (nom, pais) VALUES (:nom, :pais)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom'  => $nom,
        ':pais' => $pais,
    ]);
}

// Elimina un desenvolupador per ID
function esborrarDev($pdo, $id) {
    $sql = "DELETE FROM desenvolupador WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
?>
