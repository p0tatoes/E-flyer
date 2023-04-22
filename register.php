<?php
include 'head.php';

/* 
Register Functionality
Registers username, email, password, contact, address, ip, registration date, and user type into the database, if all input fields in the form are filled.
If not, an alert popup will show up
*/
if ($_REQUEST['name'] != "" && $_REQUEST['email'] != "" && $_REQUEST['password'] != "" && $_REQUEST['contact'] != "" && $_REQUEST['address'] != "") {
    $query = "select * from user where email='" . $_REQUEST['email'] . "'";
    $result = mysql_query($query) or die(mysql_error());
    $total_results = mysql_num_rows($result);

    if ($total_results == 0) {
        $all_query = "select * from user";
        $all_result = mysql_query($query) or die(mysql_error());
        $total_all = mysql_num_rows($all_result);
        if ($total_all == 0):
            $query = "insert into user(email, passwd, contact, name, address, usertype, user_date, user_ip) values('" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "', '" . $_REQUEST['contact'] . "', '" . $_REQUEST['name'] . "' ,'" . $_REQUEST['address'] . "', 'admin', '" . date("Y-m-d h:i:s") . "', '" . $_SERVER['REMOTE_ADDR'] . "')";
            $result = mysql_query($query) or die(mysql_error());
        else:
            $query = "insert into user(email, passwd, contact, name, address, usertype, user_date, user_ip) values('" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "', '" . $_REQUEST['contact'] . "', '" . $_REQUEST['name'] . "' ,'" . $_REQUEST['address'] . "', 'customer', '" . date("Y-m-d h:i:s") . "', '" . $_SERVER['REMOTE_ADDR'] . "')";
            $result = mysql_query($query) or die(mysql_error());
        endif;
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=login&#login_form">';
        echo '<script>alert("Account has been registered")</script>';
    } else {
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=register&#login_form">';
        echo '<script>alert("Try again: Account has already been taken D:")</script>';
    }
}

if ($_REQUEST['action'] == 'register') {
    print('<p id="register">Register</p>');
    print('<form action=index.php method=post>');
    print('Enter Name<input type=text name=name><br>');
    print('Enter Email<input type=text name=email><br>');
    print('Enter Password<input type=text name=password><br>');
    print('Enter Contact<input type=text name=contact><br>');
    print('Enter Address<input type=text name=address><br>');
    print('<input type=submit value=submit name=submit>');
    print('</form>');
}
?>