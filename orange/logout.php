<?php
session_start();
unset ($_session['myusername']);
session_destroy();
header ("Location: index.php");
?>