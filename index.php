<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Meu site de animais</title>

    <title>Meu Primeiro Post</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">

    <style>
        body {
            padding-top: 56px;
        }
    </style>

</head>

<body>
    <?php

    session_start();

    $mysqli = new mysqli("localhost", "blog_animais", "HQm7Bxumv67iKra6", "animais");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $mysqli->set_charset("utf8");    

    if (isset($_POST['origem']) && $_POST['origem'] == 'cadastro') {
        $resultado_cadastro = '';
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['pass'];

        if ($mysqli->query("INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')")) {
            $resultado_cadastro = "Sucesso no cadastro!";
        } else {
            print_r($mysqli->error_list);
        }
    }

    if (isset($_POST['origem']) && $_POST['origem'] == 'contato') {
        $resultado_cadastro = '';
        $nome = $_POST['nome'];        
        $mensagem = $_POST['mensagem'];

        if ($mysqli->query("INSERT INTO mensagens(nome, mensagem) VALUES ('$nome', '$mensagem')")) {
            $resultado_contato = "Mensagem enviada com sucesso.";
        } else {
            print_r($mysqli->error_list);
        }
    }

    if (isset($_POST['origem']) && $_POST['origem'] == 'login') {
        $logado = false;
        $email = $_POST['email'];
        $senha = $_POST['pass'];

        $consulta = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'");
        if ($consulta) {
            if ($consulta->num_rows > 0) {
                $_SESSION['logado'] = true;
                $resultado = $consulta->fetch_array();
                $_SESSION['nome'] = $resultado['nome'];
            } else {
                $_SESSION['erro'] = 'Usuário/senha incorretos';
            }
        } else {
            print_r($mysqli->error_list);
        }
    }

    //$mysqli->real_query("SELECT * FROM mensagens ORDER BY id ASC");
    //$mensagens = $mysqli->use_result();


    ?>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Bem-vindo ao meu site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Title -->
                <h1 class="mt-4">Meu Primeiro Post</h1>
                <!-- Author -->
                <p class="lead">por
                    <a href="#">Fábio S. Reszko</a>
                </p>
                <hr>
                <!-- Date/Time -->
                <p>Postado em 29/10/2019 às 19:40</p>
                <hr>
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="gatinho.jpg" alt="">
                <hr>
                <!-- Post Content -->
                <p class="lead">O gato doméstico foi denominado Felis catus por Carolus Linnaeus na sua obra Systema Naturae, de 1758[12].</p>

                <p>Pelas regras de prioridade do Código Internacional de Nomenclatura Zoológica, o nome da espécie deveria ser Felis catus. No entanto, na prática, a maioria dos biólogos utilizam Felis silvestris para as espécies selvagens e Felis catus
                    somente para as formas domesticadas. Na opinião n.º 2027, publicada no Volume 60 (Parte I) do Bulletin of Zoological Nomenclature (31 de março de 2003),[14] a Comissão Internacional de Nomenclatura Zoológica confirmou a utilização
                    de Felis silvestris para denominar o gato selvagem e Felis silvestris catus para as subespécies domesticadas. </p>
                <hr>
                <!-- Comments Form -->
                <div class="card my-4">
                    <?php include "_contato.php" ?>
                </div>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <div class="card my-4">
                    <h5 class="card-header">Meu Site</h5>
                    <div class="card-body">
                        Neste site eu vou falar sobre tudo que existe de bom sobre os animais, incluindo os de estimação e também aqueles que não podemos ter em casa, pois são muito grandes :)
                    </div>
                </div>
                <div class="card my-4">
                    <?php include "_login.php" ?>
                </div>
                <div class="card my-4">
                    <?php include "_cadastro.php" ?>
                </div>
            </div>
        </div>
        

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Meu site 2019</p>
        </div>
        <!-- /.container -->
    </footer>
</body>

</html>