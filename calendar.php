<link rel="stylesheet" href="css/table-style.css">

<?php
// MySQLi snippet
include 'head.php';

// Get the current year and month
$year = date('Y');
$month = date('m');
$current_day = date('d');

// Get the number of days in the current month
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Get the name of the current month, F in format('F') means the full name of the month
$date = new DateTime("$year-$month-01");
$month_name = $date->format('F');

// Get the index of the first day of the month (0 = Sunday, 1 = Monday, etc.)
//The first argument, 'w', specifies that we want to retrieve the day of the week as a numeric value (0 for Sunday, 1 for Monday, and so on).
//strtotime function creates a timestamp representing the first day of the given month and year.
$first_day_index = (int) date('w', strtotime("$year-$month-01"));

// Start the table and print the month name
echo "<table width=80% border=1 class='admin_table'><caption>$month_name $year</caption>";

// Print the table headers (days of the week)
echo '<tr class="calendar_row">';
echo "<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>";
echo "<th>Thu</th><th>Fri</th><th>Sat</th>";
echo "</tr>";

// Start a new row for the first week
echo '<tr style="background-color: white;">';

// Print blank cells for the days before the first day of the month
for ($i = 0; $i < $first_day_index; $i++) {
    echo "<td></td>";
}

/**
 * Gets days of the month and total amount of orders made during that day
 */
$order_per_day_statement = "SELECT DATE_FORMAT(date, '%e') AS day_of_month, COUNT(*) AS total_orders FROM purchases WHERE DATE_FORMAT(date, '%m')=$month GROUP BY day_of_month";
$orders_per_day = mysqli_fetch_all(mysqli_query($lazada, $order_per_day_statement), MYSQLI_ASSOC);
/**
 * Stores day and order count for the day in an associative array
 * the day serves as the key/index, and the order count is its value
 */
$day_and_orders = [];
foreach ($orders_per_day as $key => $order_count) {
    $day_of_month = $order_count['day_of_month'];
    $count = $order_count['total_orders'];
    $day_and_orders[$day_of_month] = $count;
}

// Print the cells for the days of the month
for ($day = 1; $day <= $num_days; $day++) {
    // Start a new row at the beginning of each week
    if ($day > 1 && ($day - 1 + $first_day_index) % 7 == 0) {
        echo '</tr><tr style="background-color: white;">';
    }

    // ! To remove, obselete
    // ? Keep as backup for rollback
    // Print the cell for the current day
    // echo "<td align=center>$day</td>";

    /**
     * if there are no orders for the day, it just prints out the day of the month
     * if there are orders for the day, day of the month is printed alongside total number of orders for that day
     */
    $day_cell = <<<HTML
    <td align=center>
        $day
    </td>
    HTML;

    if (isset($day_and_orders[$day])) {
        if ($day_and_orders[$day] > 0) {
            $day_cell = <<<HTML
            <td align=center>
                <a href="manage_orders.php?month=$month&day=$day">$day ($day_and_orders[$day])</a>
            </td>
            HTML;
        }
    }

    echo $day_cell;
}

// ! To remove, obselete
// ? Keep as backup for rollback
// Print the cells for the days of the month
// for ($day = 1; $day <= $num_days; $day++) {
//     // Start a new row at the beginning of each week
//     if ($day > 1 && ($day - 1 + $first_day_index) % 7 == 0) {
//         echo "</tr><tr>";
//     }

//     // Print the cell for the current day
//     echo "<td align=center>$day</td>";
// }

// End the last row and the table
echo "</tr></table>";
?>