<?php
require "./database/db.php";
try {
    function validarEmail($email)
    {
        $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (preg_match($patron, $email)) {
            return true;
        } else {
            return false;
        }
    }
    function validarSinNumeros($cadena)
    {
        $patron = '/^[^\d]+$/';
        return preg_match($patron, $cadena);
    }
    if (!empty($_POST["registerButton"])) {
        if (empty($_POST["registerName"]) || empty($_POST["registerLastName"]) || empty($_POST["registerPhone"]) || empty($_POST["registerEmail"]) || empty($_POST["registerPassword"])) {
            throw new Exception("Faltan completar datos", 400);
        }
        $nombre = $_POST["registerName"];
        $apellido = $_POST["registerLastName"];
        if (!validarSinNumeros($nombre) || !validarSinNumeros($apellido))
            throw new Exception("El nombre o apellido no deben contener caracteres especiales", 400);
        $telefono = $_POST["registerPhone"];
        if (strlen($telefono) !== 9)
            throw new Exception("El telefono debe contener 9 numeros", 400);
        $email = $_POST["registerEmail"];
        if (!validarEmail($email))
            throw new Exception("Email invalido", 400);
        $password = $_POST["registerPassword"];
        if (strlen($password) < 8)

            throw new Exception("La contraseña debe contener minimo 8 carcteres", 400);

        $passwordCifrada = password_hash($password, PASSWORD_DEFAULT);
        $checkEmail = "SELECT email FROM usuario WHERE email = :email";
        $checkEmail = $conn->prepare($checkEmail);
        $checkEmail->bindParam(":email", $email);
        $checkEmail->execute();
        $checkEmail->fetch(PDO::FETCH_OBJ);
        if ($checkEmail->rowCount() !== 0) {
            throw new Exception("El email que introdujo ya se encuentra registrado.", 409);
        }
        $query = "INSERT IGNORE INTO usuario (nombre, apellido, email, passwd, celular) VALUES (:nombre, :apellido, :email, :passwd, :celular)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $sql->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->bindParam(":passwd", $passwordCifrada, PDO::PARAM_STR);
        $sql->bindParam(":celular", $telefono, PDO::PARAM_INT);
        $sql->execute();

        $query = "SELECT ID_usuario FROM usuario WHERE email = :email";
        $sql = $conn->prepare($query);
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id_usuario = $id["ID_usuario"];

        $query = "INSERT INTO usuario_rol (id_rol, id_usuario) VALUES (2, :id_usuario)";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $sql->execute();

        header("location:./login");

    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); window.location.href = "./registerAdmin"; </script>';
}
$conn = null;
?>