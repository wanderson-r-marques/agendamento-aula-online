<?php
session_start();
$id_monitor = $_SESSION['id'];
if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
    require '../conexao.php';
    $email = $_SESSION['email'];
    try {
        $query = "SELECT * FROM monitores WHERE email = '$email'";
        $con = conectar();
        $smtp = $con->prepare($query);
        $smtp->execute();
        if (!$smtp->rowCount()) {
            unset($_SESSION['email']);
            header('Location: index.php');
        }
    } catch (PDOException $Exception) {
        unset($_SESSION['email']);
        header('Location: index.php');
    }

} else {
    unset($_SESSION['email']);
    header('Location: index.php');
}
