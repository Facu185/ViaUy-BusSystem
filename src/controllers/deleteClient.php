<?php
require "./database/db.php";

try {
    if (!empty($_POST["deleteClient"])) {
        $email = $_POST["clientEmail"];
        $id_usuario = $_SESSION["usuario"]["ID_usuario"];
        $query = "SELECT ID_rol FROM usuario_rol WHERE ID_usuario =:id_usuario";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();
        $rol = $sql->fetch(PDO::FETCH_ASSOC);
        $id_rol = $rol["ID_rol"];
        if ($id_rol == 3) {
            $query = "UPDATE usuario SET activo = 1 WHERE email =:email";
            $sql = $conn->prepare($query);
            $sql->bindParam(":email", $email);
            $sql->execute();
            unset($_SESSION["usuario"]);
        } elseif ($id_rol == 2 && $_SESSION["rol"] == 1) {
            $query = "UPDATE usuario SET activo = 1 WHERE email =:email";
            $sql = $conn->prepare($query);
            $sql->bindParam(":email", $email);
            $sql->execute();
            unset($_SESSION["usuario"]);
        }else{
            unset($_SESSION["usuario"]);
            echo '<script>alert("El usuario no puede ser eliminado"); window.location.href = "./clients"; </script>';
        }
        echo '<script>alert("Usuario eliminado con exito"); window.location.href = "./clients"; </script>';
    }
    if (!empty($_POST["activateClient"])) {
        $email = $_POST["clientEmail"];
        $id_usuario = $_SESSION["usuario"]["ID_usuario"];
        $query = "SELECT ID_rol FROM usuario_rol WHERE ID_usuario =:id_usuario";
        $sql = $conn->prepare($query);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();
        $rol = $sql->fetch(PDO::FETCH_ASSOC);
    
        $id_rol = $rol["ID_rol"];
        if ($id_rol == 3) {
            $query = "UPDATE usuario SET activo = 0 WHERE email =:email";
            $sql = $conn->prepare($query);
            $sql->bindParam(":email", $email);
            $sql->execute();
            unset($_SESSION["usuario"]);
        } elseif ($id_rol == 2 && $_SESSION["rol"] == 1) {
            $query = "UPDATE usuario SET activo = 0 WHERE email =:email";
            $sql = $conn->prepare($query);
            $sql->bindParam(":email", $email);
            $sql->execute();
            unset($_SESSION["usuario"]);
        }
        echo '<script>alert("Usuario activado con exito"); window.location.href = "./clients"; </script>';
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}
?>