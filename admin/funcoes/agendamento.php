<?php

require '../valida.php';
if ($_GET['funcao'] == 'cadastrar') {
    $descrição = $_POST['descricao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $qtd_alunos = $_POST['qtd_alunos'];
    $semana = $_POST['semana'];
    $link = $_POST['link'];
    $id_monitor = $_SESSION['id'];

    $query = "INSERT INTO `agendamentos` (
        `descricao`,
        `id_monitor`,
        `data_inicio`,
        `data_fim`,
        `qtd_alunos`,
        `semana`,
        `link`
      )
      VALUES
        (
          :descricao,
          :id_monitor,
          :data_inicio,
          :data_fim,
          :qtd_alunos,
          :semana,
          :link
        );
      ";
    $con = conectar();
    $smtp = $con->prepare($query);
    $smtp->bindParam(':descricao', $descrição, PDO::PARAM_STR);
    $smtp->bindParam(':id_monitor', $id_monitor, PDO::PARAM_INT);
    $smtp->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
    $smtp->bindParam(':data_fim', $data_fim, PDO::PARAM_STR);
    $smtp->bindParam(':qtd_alunos', $qtd_alunos, PDO::PARAM_INT);
    $smtp->bindParam(':semana', $qtd_alunos, PDO::PARAM_INT);
    $smtp->bindParam(':link', $link, PDO::PARAM_STR);

    if ($smtp->execute()) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Agendamento cadastrado com sucesso</div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Agendamento não cadastrado</div>";
    }
    header('Location: ../agendamento.php');
}

if ($_GET['funcao'] == 'editar') {

}

if ($_GET['funcao'] == 'excluir') {

}
