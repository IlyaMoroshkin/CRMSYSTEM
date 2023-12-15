<?php
require_once "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    $description = $_POST["description"];
    $last_name= $_POST["last_name"];

    $sql = "INSERT INTO tasks(task_name, description, client_id) 
              VALUES (:task_name, :description, :client_id)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":task_name", $task_name);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":client_id", $client_id);
    $stmt->execute();
}

    echo "Задача успешно добавлена! " . "<a href='tasks.php'>Перейти на страницу задач</a>";