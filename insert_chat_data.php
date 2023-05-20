<?php
include "head.php";

// Get the logged-in user's role (admin or customer) - Modify this according to your authentication logic
$user_type = $_COOKIE['type'];
$user_id = $_COOKIE['user_id'];
