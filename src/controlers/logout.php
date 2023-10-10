<?php
if ($_SESSION["login"]) {
    unset($_SESSION["login"]);
    header("location: ./home");
}
exit;
?>