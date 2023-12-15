<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>CRM SYSTEM - Главная страница</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php
require_once "navigate.php";
require_once "database.php";
?>

<main>

    <section class="clients">
        <h2>Клиенты</h2>
        <?php
            $pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");
            $sql = "SELECT first_name, last_name, company, email, phone FROM clients";
            $stmt = $pdo->query($sql);

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table>
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Компания</th>
                <th>E-mail</th>
                <th>Номер телефона</th>
            </tr>
            </thead>
            <tbody>
            <?php
                // Выводим данные о клиентах
                foreach ($users as $user) {
                    echo "<tr>";
                    foreach ($user as $data) {
                        echo "<td>$data</td>";
                    }
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </section>

    <section class="clients">
        <?php
            $pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");
            $sql = "SELECT tasks.task_name, tasks.description, clients.first_name, clients.last_name FROM tasks
            INNER JOIN clients ON tasks.client_id = clients.id";
            $stmt = $pdo->query($sql);

            $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h2>Задачи</h2>
        <table>
            <thead>
            <tr>
                <th>Наименование задачи</th>
                <th>Описание задачи</th>
                <th>Имя исполнителя</th>
                <th>Фамилия исполнителя</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Выводим данные о клиентах
            foreach ($clients as $clients) {
                echo "<tr>";
                foreach ($clients as $data) {
                    echo "<td>$data</td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
</main>

<footer>

</footer>
</body>
</html>
