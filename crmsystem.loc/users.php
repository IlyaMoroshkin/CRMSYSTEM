<?php

require_once "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");
$sql = "SELECT login, first_name, middle_name, last_name FROM users";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Заголовок страницы
$pageTitle = "CRM SYSTEM - Сотрудники";

// Включаем шапку страницы
require_once 'navigate.php';
?>

<main>

    <section class="search">
        <input type="search"/>
    </section>

    <section class="clients">
        <h2>Сотрудники</h2>
        <table>
            <thead>
            <tr>
                <th>Логин</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Фамилия</th>
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
</main>
