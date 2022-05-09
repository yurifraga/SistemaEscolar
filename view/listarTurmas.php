<?php
session_start();
require_once "../view/pages/topo.php";
require_once "../conexao.php" ;
require_once "../model/alunos_model.php";
require_once "../model/turma_model.php";
require_once "../verifica_login.php";
$listar = new Turma_model;
$conexao = $listar->setConn($conn);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title style="margin-top:10px;">Lista de alunos</title>
    <script src="../scripts/jquery/jquery-3.6.0.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body >
  <h1 align="center" style="margin-top: 50px">Lista de Turmas</h1>
    <form metho="POST" id="formulario">
        <div class="col-md-3">
            <label class="form-label">Turma:</label>
            <select name="turma" id="turma" class="form-select" >
            <option value="0">Selecione...</option>
            <?php
                $listarTurmas = $listar->getTurma();
                foreach($listarTurmas as $turmas){
                    echo "<option value=".$turmas['id'].">".$turmas['turma']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-5" style="margin-top:10px">
            <button class="btn btn-primary" form="formulario" id="buscar" type="button">Buscar</button>
        </div>
        <div class="result">
            
        </div>
    </form>
    
    <script>
        //////////////Não esta funcionando//////////////////////
       /*  $('#formulario').submit(function(e){
            e.preventDefault(); */
        $('#buscar').on('click', function(){
            var turma = $("#turma").val();
            $.ajax({
                url:"../view/selecionarturmas.php",
                type:"POST",
                dataType:'html',
                data:{turma: turma},
                success:function(result){
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });
        //});

    </script>
  </body>
</html>