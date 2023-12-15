<?php

require_once "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");
$sql = "SELECT first_name, last_name, company, email, phone FROM clients";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Заголовок страницы
$pageTitle = "CRM SYSTEM - Клиенты";

// Включаем шапку страницы
require_once 'navigate.php';
?>

<main>

    <section class="search">
        <input type="search"/>
    </section>

    <section class="clients">
        <h2>Клиенты</h2>
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

    <section>
        <h2>Добавить клиента</h2>
        <form action="client_add.php" method="post">
            <table>
                <tr>
                    <td>Имя:</td>
                    <td><input type="text" name="first_name"></td>
                    <td>Фамилия:</td>
                    <td><input type="text" name="last_name"></td>
                    <td>Компания:</td>
                    <td><input type="text" name="company"></td>
                    <td>E-mail:</td>
                    <td><input type="text" name="email"></td>
                    <td>Номер телефона:</td>
                    <td><input type="text" name="phone"></td>
                </tr>
            </table>
            <button>Добавить клиента</button>
        </form>
    </section>
</main>
