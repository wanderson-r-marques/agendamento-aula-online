<?php
require 'valida.php';
$dataHj = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Patrícia Cylene | Agendamento</title>
  <link rel="icon" type="image/png" href="https://patriciacylene.com.br/meta/favicon-32x32.png" sizes="32x32">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body >
  <?php include 'inc_nav.php'?>
  <div class="py-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
          <h2 class="text-center pb-4 text-success"><b><?=$_SESSION['nome']?></b></h2>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <h3 class="">Agendamento <span class="badge badge-warning"> cadastro</span></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
          <?php 
            if(isset($_SESSION['msg']) != '' && $_SESSION['msg']){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
          ?>
          <form method="post" action="funcoes/agendamento.php?funcao=cadastrar">
            <div class="form-group">
                <label for="exampleFormControlInput1">Descrição</label>
                <input type="text" name="descricao" class="form-control" required id="exampleFormControlInput1" placeholder="Sábado 15:30min às 16:30min">
            </div>
            <div class="form-row">
                <div class="col">
                <label for="exampleFormControlInput1">Data início</label>
                <input name="data_inicio" type="datetime-local" required class="form-control">
                </div>
                <div class="col">
                <label for="exampleFormControlInput1">Data final</label>
                <input type="datetime-local" name="data_fim" required class="form-control">
                </div>
            </div>
            <div class="form-row  mt-2">
                <div class="col">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" name="link" required class="form-control">
                </div>
                <div class="col-2">
                <label for="exampleFormControlInput1">Qtd alunos</label>
                <input type="number" name="qtd_alunos" required class="form-control">
                </div>
            </div>
            <div class="form-row  mt-2">
                <div class="col-2">
                <label for="exampleFormControlInput1">Semana</label>
                <input type="number" name="semana"  class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Cadastrar</button>
          </form>
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