<?php
if ($_SESSION["rol"]) {
    unset($_SESSION["rol"]);
    unset($_SESSION["login"]);
    header("location: ./login");
}else{
    unset($_SESSION["login"]);
    header("location: ./home");
}
exit;
?>