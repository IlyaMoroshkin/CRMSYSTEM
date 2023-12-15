<?php

require "database.php"; // Подключение к базе данных.

$pdo = new PDO("mysql:host=localhost;dbname=crm","moroshkin_ilya","Stjnnnee111");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Пример SQL-запроса для проверки логина и пароля в базе данных
    $query = "SELECT login, password FROM users WHERE login = :login AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Проверяем, есть ли пользователь с такими данными
    if ($stmt->rowCount() == 1) {
        header("Location: main.php");
        exit();
    } else {
        // Если данные неверны, вы можете вывести сообщение об ошибке.
        echo "Неверный логин или пароль. " . "<a href='index.php'>Вернуться для повторной авторизации</a>";
    }
}

