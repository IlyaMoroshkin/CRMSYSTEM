<?php
require_once "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=crm", "moroshkin_ilya", "Stjnnnee111");
$sql = "SELECT tasks.task_name, tasks.description, clients.first_name, clients.last_name FROM tasks
        INNER JOIN clients ON tasks.client_id = clients.id";
$stmt = $pdo->query($sql);

$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Заголовок страницы
$pageTitle = "CRM SYSTEM - Задачи";

// Включаем шапку страницы
require_once 'navigate.php';
?>

<main>
    <section class="clients">
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
    <section>
        <h2>Добавить задачу</h2>
        <form action="task_add.php" method="post">
            <table>
                <tr>
                    <td>Наименование задачи:</td>
                    <td><input type="text" name="task_name"></td>
                    <td>Описание задачи:</td>
                    <td><input type="text" name="description"></td>
                    <td>Исполнитель
                        <?php
                        // Запрос к базе данных для получения данных
                        $query = "SELECT last_name FROM clients";
                        $stmt = $pdo->query($query);

                        // Создание выпадающего списка
                        echo '<select name="clients">';

                        // Проход по результатам запроса и создание <option>
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="">' . $row['last_name'] . '</option>';
                        }
                        echo '</select>';
                        ?>
                    </td>
                </tr>
            </table>
            <button>Добавить задачу</button>
        </form>
    </section>

</main>