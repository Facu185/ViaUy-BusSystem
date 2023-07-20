<?php 
require "../database/db.php";
try{
    if (!empty($_POST["loginButton"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            throw new Exception("Faltan completar datos", 400);
        }
        $email = $_POST["email"];
        $password = $_POST["password"]; 
        $query ="SELECT * FROM usuario WHERE email = :email";
        $sql=$conn->prepare($query);
        $sql->bindParam(":email",$email);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if(empty($data)) throw new Exception("Alguno de los campos es invalido", 404);
        print_r($data);
        if(!password_verify($password,$data["passwd"])) throw new Exception("Alguno de los campos es invalido", 403);
        header("location:./pages/home.php");
    }
}catch(Exception $error){
    echo($error->getMessage());
}
?>