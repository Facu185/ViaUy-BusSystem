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
                $sql->bindParam(":email", $email, PDO::PARAM_STR);
                $sql->execute();
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                if (!isset($_SESSION['contador']) || $_SESSION['contador'] >= 4) {
                    $lastAttempt = isset($_SESSION['last_attempt']) ? $_SESSION['last_attempt'] : 0;
                    $currentTime = time();

                    if ($currentTime - $lastAttempt < 30) {
                        throw new Exception("Demasiados intentos fallidos, espere un momento...", 404);
                        exit;
                    } else {
                        $_SESSION['contador'] = 0;
                        $_SESSION['last_attempt'] = $currentTime;
                    }
                }
                if (empty($data)) {
                    $_SESSION['contador']++;
                    $_SESSION['last_attempt'] = time();
                    throw new Exception("Alguno de los campos es invalido", 404);
                }

                if (!password_verify($password, $data["passwd"])) {
                    $_SESSION['contador']++;
                    $_SESSION['last_attempt'] = time();
                    throw new Exception("Alguno de los campos es invalido", 403);
                }
                $loginData = $data;
                $ID_usuario = $data["ID_usuario"];

                $query = "SELECT ID_rol FROM usuario_rol WHERE ID_usuario = :ID_usuario";
                $sql = $conn->prepare($query);
                $sql->bindParam(":ID_usuario", $ID_usuario, PDO::PARAM_INT);
                $sql->execute();
                $rol = $sql->fetch(PDO::FETCH_ASSOC);
                $id_rol = $rol["ID_rol"];

                if ($id_rol === 3 && $data["activo"] == 0) {
                    $_SESSION["login"] = array();
                    $_SESSION["login"] = $loginData;
                    header("location:./home");
                } elseif ($id_rol === 2 || $id_rol === 1 && $data["activo"] == 0) {
                    $_SESSION["login"] = array();
                    $_SESSION["login"] = $loginData;
                    $_SESSION["rol"] = $id_rol;
                    header("location:./dashboard");
                } else {
                    $_SESSION['contador']++;
                    $_SESSION['last_attempt'] = time();
                    echo '<script>alert("No se pudo iniciar sesion"); window.location.href = "./login"; </script>';
                }
            }

        }

    } catch (Exception $error) {
        echo '<script>alert("' . $error->getMessage() . '"); </script>';
    }
}
sign_In();
$conn = null;
?>