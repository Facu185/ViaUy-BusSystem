<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function sign_In()
{
    require "./database/db.php";

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["loginButton"])) {
                if (empty($_POST["email"]) || empty($_POST["password"])) {
                    throw new Exception("Faltan completar datos", 400);
                }
                $email = $_POST["email"];
                $password = $_POST["password"];
                $query = "SELECT * FROM usuario WHERE email = :email";
                $sql = $conn->prepare($query);
                $sql->bindParam(":email", $email);
                $sql->execute();
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                if (empty($data))
                    throw new Exception("Alguno de los campos es invalido", 404);
                if (!password_verify($password, $data["passwd"]))
                    throw new Exception("Alguno de los campos es invalido", 403);
                $loginData = $data;

                $_SESSION["login"] = array();
                $_SESSION["login"] = $loginData;
                header("location:./home");
            }

        }

    } catch (Exception $error) {
        echo '<script>alert("' . $error->getMessage() . '"); </script>';
    }
}
sign_In();

?>