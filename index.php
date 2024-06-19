<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Установка соединения с базой данных
$host = 'localhost';
$username = 'glpi';
$password = 'fkmnfbh';
$database = 'glpi';

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Декабрь 2023 - Июнь 2024 - Организация АРМ</title>

</head>

<body>

<style>
.table {
	width: 100%;
	margin-bottom: 20px;
	border: 1px solid #dddddd;
	border-collapse: collapse; 
}
.table th {
	font-weight: bold;
	padding: 5px;
	background: #efefef;
	border: 1px solid #dddddd;
}
.table td {
	border: 1px solid #dddddd;
	padding: 5px;
}
</style>

<?php

// Установка диапазона дат
$startDate = '2023-12-01';
$endDate = '2024-06-30';

// SQL-запрос для поиска тикетов по категории на русском и в заданном диапазоне дат
$categoryName = 'Организация АРМ';

$sql = "SELECT glpi_tickets.id AS ticket_id, 
               glpi_tickets.name AS ticket_name, 
               glpi_tickets.content AS ticket_description, 
               glpi_tickets.date, 
               glpi_tickets.solvedate,
               glpi_tickets.closedate,
               glpi_users.firstname AS responsible_name,
               glpi_users.realname AS assigned_to
        FROM glpi_tickets
        JOIN glpi_itilcategories ON glpi_tickets.itilcategories_id = glpi_itilcategories.id
        JOIN glpi_users ON glpi_tickets.users_id_recipient = glpi_users.id
        WHERE glpi_itilcategories.name = '$categoryName'
        AND glpi_tickets.date BETWEEN '$startDate' AND '$endDate'";


$result = $connection->query($sql);

$ticketCount = 0; // Переменная для подсчета количества тикетов
$onTimeTicketCount = 0;
$lateTicketCount = 0;
$onTimeTickets = 0;

echo "<h1>Организация АРМ: Декабрь 2023 - Июнь 2024</h1>";

if ($result->num_rows > 0) {
    // Обработка результатов запроса
    while ($row = $result->fetch_assoc()) {
        $ticketCount++;

        $date1 = ($row["date"] !== null) ? new DateTime($row["date"]) : null;
        $date2 = ($row["solvedate"] !== null) ? new DateTime($row["solvedate"]) : null;

        if ($date1 && $date2) {
            $interval = $date1->diff($date2);
            $daysPassed = $interval->d;

            if ($daysPassed <= 3) {
                $onTimeTickets++;
            }

            // Проверка, прошло ли не более 2 дней
            if ($daysPassed <= 2) {
                $onTimeTicketCount++;
            }

            // Проверка, прошло ли более 2 дней
            if ($daysPassed > 2) {
                $lateTicketCount++;
            }
        }
    }

    // Вывод информации о найденных тикетах в виде таблицы
    echo "<table class='table'>
    <tr>
        <th>№</th>
        <th>ID тикета</th>
        <th>Название тикета</th>
        <th>Дата создания</th>
        <th>Дата решения</th>
        <th>Дата закрытия</th>
        <th>Ответственный</th>
        <th>Назначено</th>
    </tr>";

    $ticketNumber = 1;

    // Цикл для вывода информации о каждом тикете с указанием номера
    $result->data_seek(0); // Сброс внутреннего указателя на начало результата
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $ticketNumber . "</td>";
        echo "<td>" . $row["ticket_id"] . "</td>";
        echo "<td>" . $row["ticket_name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["solvedate"] . "</td>";
        echo "<td>" . $row["closedate"] . "</td>";
        echo "<td>" . $row["responsible_name"] . "</td>";
        echo "<td>" . $row["assigned_to"] . "</td>";
        echo "</tr>";
        $ticketNumber++;
    }

    echo "</table>";


    // Добавляем кнопку "Сформировать файл" перед таблицей
    echo '<br>';
    echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
    echo '<input type="hidden" name="export" value="true">';
    echo '<input type="submit" value="Сформировать файл">';
    echo '</form>';

if(isset($_POST['export']) && $_POST['export'] === 'true') {
    // Открываем файл для записи
    $file = fopen("report_organizacia_arm_full.csv", "w");

    // Заголовки столбцов
    $headers = array('№', 'ID тикета', 'Название тикета', 'Дата создания', 'Дата решения', 'Дата закрытия', 'Ответственный', 'Назначено');
    fputcsv($file, $headers, ';'); // Записываем заголовки в файл

    // Цикл для записи информации о каждом тикете в файл
    $result->data_seek(0); // Сброс внутреннего указателя на начало результата
    $ticketNumber = 1;
    while ($row = $result->fetch_assoc()) {
        $data = array(
            $ticketNumber,
            $row["ticket_id"],
            $row["ticket_name"],      
            $row["date"],
            $row["solvedate"],
            $row["closedate"],
            $row["responsible_name"],
            $row["assigned_to"]
        );
        fputcsv($file, $data, ';'); // Записываем данные о тикете в файл
        $ticketNumber++;
    }

    // Закрываем файл после записи
    fclose($file);

    echo "Экспорт данных успешно завершен. <a class='btn' href='report_organizacia_arm_full.csv' download>Скачать файл</a>";
}

    echo "<h1>Организация АРМ</h1>";
    echo "<h3>Итого за Декабрь 2023 - Июнь 2024:</h3>";
    echo "Всего тикетов за месяц: <span style='font-size:24px;font-weight:bold;'>" . $ticketCount . "</span><br />";
    echo "Количество вовремя решенных заявок (не более 2 дней): " . $onTimeTicketCount . "<br />";
    echo "Количество заявок, решенных не вовремя (более 2 дней): " . $lateTicketCount;
    echo "<hr>";

} else {
    echo "Нет результатов для категории '$categoryName' за период с $startDate по $endDate.";
}

?>

  
</body>
</html>
