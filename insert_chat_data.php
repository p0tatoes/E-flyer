<?php
include "head.php";

// Get the logged-in user's role (admin or customer) - Modify this according to your authentication logic
$user_type = $_COOKIE['type'] ?? null;
$user_id = $_COOKIE['user_id'] ?? null;

/**
 * Handles sending message and storing messages in the database
 */
if ($user_type === "admin") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message']) && isset($_POST['receiver'])) {
        $newMessage = mysqli_real_escape_string($lazada, $_POST['message']);
        $recipient = mysqli_real_escape_string($lazada, $_POST['receiver']);

        $query = "INSERT INTO messages VALUES(1, $recipient, '$newMessage', NOW())";
        $insertResult = mysqli_query($lazada, $query);

        if (!$insertResult) {
            echo "Error inserting chat message: " . mysqli_error($lazada);
        }
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
        $newMessage = mysqli_real_escape_string($lazada, $_POST['message']);

        $query = "INSERT INTO messages (sender, recipient, message, timestamp) VALUES ($user_id, 1, '$newMessage', NOW())";
        $insertResult = mysqli_query($lazada, $query);

        if (!$insertResult) {
            echo "Error inserting chat message: " . mysqli_error($lazada);
        }

        // Handle the case when the customer's ID is not found
        mysqli_close($lazada);
    }
}

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
