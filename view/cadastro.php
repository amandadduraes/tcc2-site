
<html>
   <head>   
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cadastro</title>

      <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/cadastro.css">
      <script src="https://kit.fontawesome.com/a81368914c.js"></script>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../assets/css/turmas.css">     

      <script type="text/javascript">

        $(document).ready(function () {
          $('#cadastrar').submit(function(e) {
            e.preventDefault();
            var nome = $("#nome").val();
            var email = $("#email").val();
            var senha = $("#senha").val();
            var instituicao = $("#instituicao").val();
            var perfil = $("#perfil").val();

            if(senha.length < 5) {
               alert("O campo senha deve conter no mínimo 5 caracteres!")
               return;
            }

            $.ajax({
               type: "POST",
               url: "../controller/UsuarioController.php",
               data: {
                  save: 1,
                  nome,
                  email,
                  senha,
                  instituicao,
                  perfil
               }, 
               success: function(data) {
                  var value=JSON.parse(data)
                  if (value.error)
                  {
                     alert("E-mail já cadastrado!")
                     return
                  }
                  alert(
                     data 
                        ? "Cadastro efetuado com sucesso!"
                        : "Erro ao realizar cadastro!"
                  )

                  location.href="./login.phpc"
               },
               error: function (data) {
                  alert("Erro inesperado, tente novamente!")
                  console.log(data)
               }
            })
          })
      })
     </script>
   </head>

   <body>

      <div class="container-cadastro">
         <div class="signup-more">
            <img src="../assets/img/undraw_open_source_1qxw.svg" alt="">
         </div>
         <div class="wrap-signup">
          
            <form  id="cadastrar" class="signup-form" name="cadastro">
               <span class="signup-form-title"> Cadastrar</span>
               <a href="./login.php" class="link-to-login"> Já é cadastrado? Clique aqui para fazer login.</a>
               <div class="wrap-input">
                  <span class="lable-iput">Nome</span>
                  <input id="nome" type="text" name="nome" class="input" placeholder="Nome" required/>
                  <span class="focus-input"></span>
               </div>
               <div class="wrap-input">
                  <span class="lable-iput">E-mail</span>
                  <input type="email" class="input" name="email" placeholder="E-mail" id="email" required>
                  <span class="focus-input"></span>
               </div>
               <div class="wrap-input">
                  <span class="lable-iput">Senha</span>
                  <input type="password" class="input" name="senha" placeholder="Senha"  id="senha" required>
                  <span class="focus-input"></span>
               </div>
               <div class="wrap-input">
                  <span class="lable-iput">Instituição de Ensino</span>
                  <input type="text" class="input" name="instituicao" placeholder="Instituição de Ensino" id="instituicao" required>
                  <span class="focus-input"></span>
               </div>
               <div class="wrap-input">
                  <span class="lable-iput">Perfil</span>
                  <select name="perfil" id="perfil" class="input border-none" required>
                     <option value="aluno">Aluno</option>
                     <option value="professor">Professor</option>
                  </select>
                  <span class="focus-input"></span>
               </div>
               <input type="submit" class="btn" value="Cadastrar">
            </form>
         </div>
      </div>
   </body>
</html>