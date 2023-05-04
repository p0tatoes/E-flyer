<?php
setcookie("user_id", "", time() - 86400, '/');
setcookie("email", "", time() - 86400, '/');
setcookie("type", "", time() - 86400, '/');
setcookie("products_cart", "", time() - 86400, '/');
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>