<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta charset="utf-8" />
  <title> Login</title>
  <script>
    $(document).ready(function() {

      $("#login").submit(function(e) {

        e.preventDefault();

        var email = $("#email").val();
        var senha = $("#senha").val();

        $.ajax({
          type: "POST",
          url: "../controller/UsuarioController.php",
          data: {
            login: 1,
            email,
            senha,
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log({
              jqXHR,
              textStatus,
              errorThrown
            })

          },
          success: function(data) {
            var response = JSON.parse(data);

            if (response.res) {
              const user = response.user;

              localStorage.setItem("user_email", user.email);
              localStorage.setItem("user_name", user.nome);
              localStorage.setItem("user_perfil", user.perfil);

              if (user.perfil === "aluno") {
                location.href = "turmasAluno.php";
              } else {
                location.href = "turmasProfessor.php";

              }

              console.log(user);
            } else {
              alert("Usuário ou senha inválidos!");
            }
          }
        });
      })
    });
  </script>
</head>

<body>

  <main class="corpo">
    <img src="../assets/img/wave.png" alt="" class="wave">
    <div class="container">
      <div class="img">
        <img src="../assets/img/undraw_personalization_triu.svg" alt="">
      </div>
      <div class="login-container">
        <form id="login">
          <img class="avatar" src="../assets/img/undraw_profile_pic_ic5t.svg" alt="">
          <h2>Login</h2>

          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"> </i>


            </div>
            <div>
              <h5>E-mail: </h5>
              <input type="email" class="input" placeholder="E-mail" id="email">
            </div>
          </div>
          <div class="input-div two">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>

            <div>
              <h5>Senha</h5>
              <input type="password" class="input" placeholder="Senha" id="senha">
            </div>
          </div>
          <!-- <a href="#"> Esqueceu a senha?</a>
                    <br> -->
          <a href="./cadastro.html"> Não é cadastrado? Clique aqui para se cadastrar.</a>
          <input type="submit" class="btn" value="Login">
        </form>
      </div>
    </div>
  </main>
<script type="text/javascript" src="../assets/js/main.js"></script>
</body>
</html>