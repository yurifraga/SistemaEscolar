<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="../style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1"> 
  </head>
  <body>
    <div class="container">
      <form method="post" action="/escola/controller/Usuario.php" class="needs-validation" novalidate>
        <h1>Cadastro de <br> colaborador</h1>
        <div>
          <input type="text" name="nome" id="nome" placeholder="Nome" ><br><br>
        </div>
        <div>
          <input type="text" name="user" id="user" placeholder="Usuario" ><br><br>
        </div>
        <div>
          <input type="password" name="senha" id="senha" placeholder="Senha" ><br><br>
        </div>
        <p class="no-conta">
          Já tem uma conta? <a class="ancora" href="/escola/view/home.php">Clique aqui</a>
        </p>
        <button class="btn-entrar" type="submit">Entrar</button>
      </form>
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