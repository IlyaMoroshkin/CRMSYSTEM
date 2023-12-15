<?php

$host = "localhost"; // Имя хоста базы данных (обычно "localhost" на локальном сервере).
$dbname = "crm"; // Имя вашей базы данных.
$username = "moroshkin_ilya"; // Имя пользователя базы данных.
$password = "Stjnnnee111"; // Пароль пользователя базы данных.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

