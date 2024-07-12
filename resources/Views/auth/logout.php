<!-- resources/Views/auth/logout.php -->

<?php

session_unset();
session_destroy();

echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";


?>