<?php
setcookie("email", "", time() - 86400, '/');
setcookie("type", "", time() - 86400, '/');
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>