<?php 
if(isset($_POST['email'])){
    require 'conexao.php';
    $email = $_POST['email'];
    $query = "SELECT * FROM alunos WHERE email = '$email'"; 
    $con = conectar();
    $smtp = $con->prepare($query);         
    $smtp->execute();
    if($smtp->rowCount()){
        $row = $smtp->fetch(PDO::FETCH_OBJ);
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row->id;
        $_SESSION['nome'] = $row->nome;
        header('Location: painel.php');
    }else{
        echo "<script>alert('Esse e-mail não consta em nossa base de dados!'); window.location.href = 'index.php';</script>";
    }
}