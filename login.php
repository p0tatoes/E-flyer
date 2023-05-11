<?php

/**
 * Handles the logging in functionality of the website
 */

include 'head.php';

/**
 * If email and password are correct, the user will be redirected to the home page.
 * But instead of register and login links, there is only "welcome"
 * If login credentials are not correct, an error alert will popup
 */
$logging_in = $_REQUEST['logging_in'] ?? false;
$action = $_REQUEST['action'] ?? '';

if ($logging_in) {
    $login_query = "select * from user where email='" . $_REQUEST['email'] . "' and passwd='" . $_REQUEST['password'] . "'";
    $login_result = mysqli_query($lazada, $login_query) or die(mysqli_error($lazada));
    $total_accounts = mysqli_num_rows($login_result);
    if ($total_accounts == 0) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=register&#login_form">';
        echo '<script>alert("Account appears to not be registered. Sign up an account to login!")</script>';
    } else {
        $account = mysqli_fetch_array($login_result);
        setcookie("user_id", $account['id'], time() + 86400, '/');
        setcookie("email", $account['email'], time() + 86400, '/');
        setcookie("type", $account['usertype'], time() + 86400, '/');
        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    }
}

/**
 * Displays the login form
 */
if ($action == 'login') {
    print('<p id="login">Log in</p>');
    print('<form action=index.php?logging_in=true method=post>');
    print('Enter Email<input type=text name=email><br>');
    print('Enter Password<input type=text name=password><br>');
    print('<input type=submit value=submit name=submit>');
    print('</form>');
}
