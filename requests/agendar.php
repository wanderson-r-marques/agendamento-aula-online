<?php 
require '../valida.php';
if(isset($_POST)):
    $idAluno = $_POST['idAluno'];
    $idAgenda = $_POST['idAgenda'];
    $query = "INSERT INTO `infor407_patriciacylene`.`agendamento_aluno` (        
        `id_aluno`,
        `id_agendamento`
      )
      VALUES
        (         
          :idAluno,
          :idAgenda          
        );
      ";
      $smtp = $con->prepare($query);
      $smtp->bindParam(':idAluno',$idAluno,PDO::PARAM_INT);
      $smtp->bindParam(':idAgenda',$idAgenda,PDO::PARAM_INT);
      if($smtp->execute())
        echo json_encode('true');
    else
        echo json_encode('false');
endif;