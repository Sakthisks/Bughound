<?php

setcookie("username", "", time()-(60*60*24));
setcookie("password", "", time()-(60*60*24));
setcookie("name", "", time()-(60*60*24));
setcookie("empID", "", time()-(60*60*24));
setcookie("userlevel", "", time()-(60*60*24));
header("Location:index.php");
?>