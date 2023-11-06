<?php
require "./database/db.php";

try {
    if (!empty($_POST["lookClient"])) {
        $email= $_POST["clientEmail"];

        $query = "SELECT * FROM usuario WHERE email =:email";
        $sql = $conn->prepare($query);
        $sql->bindParam(":email", $email);
        $sql->execute();
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION["usuario"] = $usuario;

       header("Location: ./clients");
    }
} catch (Exception $error) {
    echo '<script>alert("' . $error->getMessage() . '"); </script>';
}

?>