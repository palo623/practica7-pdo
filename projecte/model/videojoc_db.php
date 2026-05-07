<?php

// Retorna tots els jocs fent JOIN amb la taula desenvolupador
function obtenirTotsElsJocs($pdo) {
    $sql = "SELECT v.*, d.nom AS nom_dev
            FROM videojoc v
            LEFT JOIN desenvolupador d ON v.desenvolupador_id = d.id
            ORDER BY v.id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Retorna un joc concret per ID
function obtenirJocPerId($pdo, $id) {
    $sql = "SELECT * FROM videojoc WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

// Insereix un nou joc a la base de dades
function insertarJoc($pdo, $titol, $genere, $preu, $data_llancament, $desenvolupador_id) {
    $sql = "INSERT INTO videojoc (titol, genere, preu, data_llancament, desenvolupador_id)
            VALUES (:titol, :genere, :preu, :data_llancament, :desenvolupador_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titol'           => $titol,
        ':genere'          => $genere,
        ':preu'            => $preu,
        ':data_llancament' => $data_llancament,
        ':desenvolupador_id' => $desenvolupador_id ?: null,
    ]);
}

// Actualitza les dades d'un joc existent
function actualitzarJoc($pdo, $id, $titol, $genere, $preu, $data_llancament, $desenvolupador_id) {
    $sql = "UPDATE videojoc
            SET titol = :titol, genere = :genere, preu = :preu,
                data_llancament = :data_llancament, desenvolupador_id = :desenvolupador_id
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id'              => $id,
        ':titol'           => $titol,
        ':genere'          => $genere,
        ':preu'            => $preu,
        ':data_llancament' => $data_llancament,
        ':desenvolupador_id' => $desenvolupador_id ?: null,
    ]);
}

// Elimina un joc per ID
function esborrarJoc($pdo, $id) {
    $sql = "DELETE FROM videojoc WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
?>
