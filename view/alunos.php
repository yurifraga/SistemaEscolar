<?php
session_start();
require_once "../view/pages/topo.php";
?>
  <head>
      <title>Cadastrar Aluno</title>
  </head>
  <body>
    <div class="container">
      <div class="">
        <h1 style="margin-top: 50px" >Novo aluno</h1>
        <?php
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
        ?>
        <form method="post" action="/escola/controller/Aluno.php" class="column g-3 needs-validation" novalidate>
          <div class="col-md-3">
            <label class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="" required>
          </div> 
          <div class="col-md-3">
            <label class="form-label">Matricula:</label>
            <input type="text" class="form-control" id="matricula" name="matricula" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Data de nascimento:</label>
            <input type="date" class="form-control" id="dataNasc" name="dataNasc" required>
          </div>
          <div class="col-5" style="margin-top:10px">
            <button class="btn btn-primary" type="submit">Cadastar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
<script>
  // Exemplo de JavaScript inicial para desabilitar envios de formulários se houver campos inválidos
(function () {
  'use strict'

  // Busque todos os formulários aos quais queremos aplicar estilos de validação Bootstrap personalizados
  var forms = document.querySelectorAll('.needs-validation')

  // Faça um loop sobre eles e impeça o envio
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>