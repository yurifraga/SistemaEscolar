<?php
require_once "../view/pages/topo.php";
require_once "../model/alunos_model.php";
$editar = new Alunos_model;
$row = mysqli_fetch_assoc($editar->editar($conn));
?>
  <head>
      <title>Editar Aluno</title>
  </head>
  <body>
    <div class="container">
      <div class="">
        <h1 style="margin-top: 50px" >Editar aluno</h1>
        <form method="post" action="/escola/view/update.php" class="column g-3 needs-validation" novalidate>
          <div class="col-md-3">
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $row['id'] ?>" required>
          </div> 
          <div class="col-md-3">
            <label class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $row['nome'] ?>" required>
          </div> 
          <div class="col-md-3">
            <label class="form-label">Matricula:</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="<?= $row['matricula'] ?>" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Data de nascimento:</label>
            <input type="date" class="form-control" id="dataNasc" name="dataNasc" value="<?= $row['data_nasci'] ?>" required>
          </div>
          <div class="col-5" style="margin-top:10px">
            <button class="btn btn-primary" type="submit">Salvar</button>
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