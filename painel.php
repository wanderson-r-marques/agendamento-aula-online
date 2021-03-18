<?php
require 'valida.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Patrícia Cylene | Agendamento</title>
  <link rel="icon" type="image/png" href="https://patriciacylene.com.br/meta/favicon-32x32.png" sizes="32x32">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body >
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container"> <a class="navbar-brand" href="#">
        <i class="fa d-inline fa-lg fa-stop-circle"></i>
        <b> PATRÍCIA CYLENE</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar16">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar16">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="#">Features</a> </li>
          <li class="nav-item"> <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="#">Pricing</a> </li>
          <li class="nav-item"> <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="#">About</a> </li>
          <li class="nav-item"> <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="#">FAQ</a> </li>
        </ul> <a class="btn navbar-btn ml-md-2 btn-light text-dark">Contact us</a>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h2 class="text-center pb-4 text-success"><b><?= $_SESSION['nome'] ?></b></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h3 class="">Agendamento da Monotoria de Redação<span class="badge badge-light"> cadastro</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Data</th>
                  <th>Dia/Hora</th>
                  <th>Monitor</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $query = "SELECT
                a.`id`,
                substring(a.`descricao`,1,40) as descricao,
                a.`id_monitor`,
                a.`data_inicio`,
                a.`data_fim`,
                a.`qtd_alunos`,
                a.`link`,
                m.`nome`
                FROM
                `agendamentos` AS a
                JOIN `monitores` AS m ON a.`id_monitor` = m.`id`";
                $smtp = $con->prepare($query);
                $smtp->execute();
                $rows = $smtp->fetchAll(PDO::FETCH_OBJ);

                foreach($rows as $row):
                    $query2 = "SELECT
                    `id`
                  FROM
                    `agendamento_aluno`
                  WHERE id_agendamento=$row->id AND id_aluno=$id_aluno";
                  $smtp2 = $con->prepare($query2);
                  $smtp2->execute();
                    if(!$smtp2->rowCount()):               
              ?>
                <tr>                  
                  
                  <td><?= date('d/m/Y', strtotime($row->data_inicio)); ?></td>
                  <td><?= $row->descricao ?></td>
                  <td><?= $row->nome ?></td>                  
                  <td><input type="checkbox" name="inputAgenda" wm-agendar wm-idAgenda="<?= $row->id ?>" wm-idAluno="<?= $_SESSION['id'] ?>"></td>
                </tr>
                <?php 
                    endif;
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row pt-4">
        <div class="col-md-12">
          <h3 class="">Agendamento <span class="badge badge-success"> confirmado</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-light">
                <tr>
                  <th>Data/Hora</th>
                  <th>Monitor</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $query = "SELECT a.`descricao`, a.`data_inicio`, a.`data_fim`, a.`link`, m.`nome` AS monitor
                FROM `agendamento_aluno` aa
                JOIN agendamentos a ON aa.`id_agendamento` = a.`id`
                JOIN `monitores` m ON a.`id_monitor` = m.`id`
              WHERE id_agendamento=$row->id AND id_aluno=$id_aluno";
                $smtp = $con->prepare($query);
                $smtp->execute();
                $rows = $smtp->fetchAll(PDO::FETCH_OBJ);

                foreach($rows as $row):                                 
              ?>
                <tr>                  
                  <td><?= $row->descricao ?></td>
                  <td><?= $row->monitor ?></td>
                  <td><a target="_blank" class="btn btn-warning" href="<?= $row->link ?>">Entrar</a></td>
                  <!-- <td>
                    <input type="checkbox" name="inputAgenda" wm-agendar wm-idAgenda="<?= $row->id ?>" wm-idAluno="<?= $_SESSION['id'] ?>">
                  </td> -->
                </tr>
                <?php                   
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/agendar.js"></script>
</body>

</html>