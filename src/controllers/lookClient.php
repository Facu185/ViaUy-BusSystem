<?php
require "./database/db.php";

try {
    if (!empty($_POST["lookClient"])) {
        $email= $_POST["clientEmail"];
        if(empty($email)){
            echo '<script>alert("Faltan completar datos"); window.location.href = "./clients"; </script>';
            exit;
        }

        $query = "SELECT * FROM usuario WHERE email =:email";
        $sql = $conn->prepare($query);
        $sql->bindParam(":email", $email);
        $sql->execute();
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        if(empty($usuario)){
            echo '<script>alert("El usuario no existe"); window.location.href = "./clients"; </script>';
            exit;
        }
        
        $_SESSION["usuario"] = $usuario;

       header("Location: ./clients");
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}

?>