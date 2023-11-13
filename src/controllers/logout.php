<?php
if ($_SESSION["rol"]) {
    unset($_SESSION["rol"]);
    unset($_SESSION[$_COOKIE["login"]]);
    header("location: ./login");
}else{
    unset($_SESSION[$_COOKIE["login"]]);
    header("location: ./home");
}
exit;
?>