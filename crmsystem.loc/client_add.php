<?php

require_once "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $company = $_POST["company"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO clients(first_name, last_name, company, email, phone) 
              VALUES (:first_name, :last_name, :company, :email, :phone)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":company", $company);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();

    echo "Клиент успещно добавлен! " . "<a href='clients.php'>Перейти на страницу клиентов</a>";
}