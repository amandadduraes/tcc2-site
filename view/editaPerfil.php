<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Perfil</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/cadastro.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>

    <script>

        $(document).ready(function() {
            $("#editForm").submit(function(e) {
                e.preventDefault();
                const nome = $("#nome").val();
                const senha = $("#senha").val();
                const instituicao = $("#instituicao").val();

                $.ajax({
                    url: "../controller/UsuarioController.php",
                    data: {
                        edit: 1,
                        nome,
                        senha,
                        instituicao
                    },
                    method: "PUT",
                    success: function(data) {
                        console.log(data)
                        if(data && JSON.parse(data)) {
                            const response = JSON.parse(data)
                            if(response.res) {
                                alert("Dados do usuário atualizados com sucesso!")
                            }
                            else {
                                alert("Não foi possível realizar esta operação, tente novamente mais tarde!")
                            }
                        }
                        else {
                            alert("Erro ao efetuar operação!")
                        }
                    }
                })
            });
        });

    </script>

</head>

<body>
<?php
    include_once "menu.php";
    
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: ../index.php");
    }

    $usuario_perfil = $_SESSION["user_perfil"]; 
    $usuario_nome = $_SESSION["user_nome"] ;
    $usuario_instituicao = $_SESSION["user_instituicao"];

    if($usuario_perfil == "professor"){
        navProfessor();
    }
    else{
        navAluno();
    }
?>

    <div class="container-cadastro">
        <div class="signup-more">
            <img src="../assets/img/editaPerfil.svg"alt="">
        </div>
        <div class="wrap-signup">

        <form id="editForm" class="col-10">
                <span class="signup-form-title"> Editar Perfil</span>
                <div class="wrap-input">
                <!-- <input type="hidden" name="email" value=''> -->
                    <span class="lable-iput">Novo Nome</span>
                    <input value="<?=$usuario_nome?>" id="nome" type="text" name="nome" class="input" placeholder="Nome" />
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input">
                    <span class="lable-iput">Nova Senha</span>
                    <input type="password" class="input" name="senha" placeholder="Senha" id="senha" minlength="5">
                    <span class="focus-input"></span>
                </div>
                <div class="wrap-input">
                    <span class="lable-iput">Nova Instituição de Ensino</span>
                    <input type="text" id="instituicao" class="input" value='<?=$usuario_instituicao?>' name="instituicao" placeholder="Instituição de Ensino" id="instituicao">
                   
                    <span class="focus-input"></span>
                </div>
                <input type="submit" value="Atualizar Perfil" class="btn">
            </form>
        </div>
    </div>
</body>

</html>