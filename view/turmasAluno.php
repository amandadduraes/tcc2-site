<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/turmas.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main1.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css"> -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/turmaAluno.js"></script>
</head>

<body>
    <?php
        include_once "menu.php";
        include_once "../model/Usuario.php";
        session_start();

        if (!isset($_SESSION["user"])) {
            header("Location: ../index.php");
        }

        $usuario = $_SESSION["user_perfil"];

        navAluno();
    ?>
    
    <div id="turmas-div" class="main-section"></div>
</body>

</html>