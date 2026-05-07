<?php
// Paràmetres de connexió a la base de dades
$host    = 'db';        // Nom del servei Docker
$db      = 'asix';
$user    = 'root';
$pass    = 'root';
$charset = 'utf8mb4';

// DSN (Data Source Name): cadena de connexió PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opcions de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Crear objecte PDO per a la connexió a la base de dades
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Error de connexió a la base de dades: " . $e->getMessage());
}
?>
