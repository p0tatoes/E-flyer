<?php
include 'head.php';

/* 
Login Functionality
If email and password are correct, the user will be redirected to the home page. But instead of register and login links, there is only "welcome"
If login credentials are not correct, an error alert will popup
*/
if ($_REQUEST['logging_in'] == true) {
    $query = "select * from user where email='" . $_REQUEST['email'] . "' and passwd='" . $_REQUEST['password'] . "'";
    $result = mysql_query($query) or die(mysql_error());
    $total_results = mysql_num_rows($result);
    $account = mysql_fetch_array($result);
    if ($total_results == 0) {
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=register&#login_form">';
        echo '<script>alert("Account appears to not be registered. Sign up an account to login!")</script>';
    } else {
        setcookie("email", $account['email'], time() + 86400);
        setcookie("type", $account['user_type'], time() + 86400);
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
}

if ($_REQUEST['action'] == 'login') {
    print('<p id="login">Log in</p>');
    print('<form action=index.php?logging_in=true method=post>');
    print('Enter Email<input type=text name=email><br>');
    print('Enter Password<input type=text name=password><br>');
    print('<input type=submit value=submit name=submit>');
    print('</form>');
}
?>