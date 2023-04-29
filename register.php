<?php
include 'head.php';

/* 
Register Functionality
Registers username, email, password, contact, address, ip, registration date, and user type into the database, if all input fields in the form are filled.
If not, an alert popup will show up
*/
$action = $_REQUEST['action'] ?? '';
$register_name = $_REQUEST['name'] ?? '';
$register_email = $_REQUEST['email'] ?? '';
$register_password = $_REQUEST['password'] ?? '';
$register_contact = $_REQUEST['contact'] ?? '';
$register_address = $_REQUEST['address'] ?? '';
if ($register_name != "" && $register_email != "" && $register_password != "" && $register_contact != "" && $register_address != "") {
    $register_query = "select * from user where email='" . $_REQUEST['email'] . "'";
    $register_result = mysqli_query($lazada, $register_query) or die(mysqli_error($lazada));
    $total_registered_accounts = mysqli_num_rows($register_result);

    if ($total_registered_accounts == 0) {
        $query_all = "select * from user";
        $all_results = mysqli_query($lazada, $query_all) or die(mysqli_error($lazada));
        $total_registered_accounts = mysqli_num_rows($all_results);
        if ($total_registered_accounts == 0):
            $register_usertype = 'admin';
        else:
            $register_usertype = 'customer';
        endif;
        $register_query = "insert into user(email, passwd, contact, name, address, usertype, user_date, user_ip) values('" . $_REQUEST['email'] . "', '" . $_REQUEST['password'] . "', '" . $_REQUEST['contact'] . "', '" . $_REQUEST['name'] . "' ,'" . $_REQUEST['address'] . "', '" . $register_usertype . "', '" . date("Y-m-d h:i:s") . "', '" . $_SERVER['REMOTE_ADDR'] . "')";
        $update_query = mysqli_query($lazada, $register_query) or die(mysqli_error($lazada));
        echo '<meta http-equiv="refresh" content="0; url=index.php?action=login&#login_form">';
        echo '<script>alert("Account has been registered")</script>';
    } else {
        echo '<meta http-equiv="refresh" content="0;url=index.php?action=register&#login_form">';
        echo '<script>alert("Try again: Account has already been taken D:")</script>';
    }
}

if ($action == 'register') {
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