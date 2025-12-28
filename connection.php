<?php
// Database connection using PDO
// Adjust $dbUser and $dbPass if your credentials differ

$host = '127.0.0.1';
$port = 3311;
$dbName = 'medical_clinic';
$dbUser = 'root';
$dbPass = '';

$dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // In production, log this error instead of displaying it
    http_response_code(500);
    echo 'Database connection failed. Please try again later.';
    exit;
}
