<?php
include "head.php";

// Get the logged-in user's role (admin or customer) - Modify this according to your authentication logic
$user_type = $_COOKIE['type'];
$user_id = $_COOKIE['user_id'];

// Retrieve chat messages based on user role and receiver
if ($user_type === "admin") {
    $query = "SELECT * FROM messages ORDER BY timestamp ASC";
} else {
    // Retrieve messages where the sender is 'Admin' and the recipient is the customer's ID or vice versa
    $query = "SELECT * FROM messages WHERE (sender=1 AND receiver=$user_id) OR (sender=$user_id AND receiver=1) OR receiver=0 ORDER BY timestamp ASC";
}

$result = mysqli_query($lazada, $query);

if ($result) {
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Error retrieving chat messages: " . mysqli_error($lazada);
}

mysqli_close($lazada);

// Send the data as a JSON response
header('Content-Type: application/json');
echo json_encode($rows);
