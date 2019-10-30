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
    $query = "SELECT * FROM mensagens ORDER BY id ASC";
    $result = $mysqli->query($query);

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
                <h1 class="mt-4">Mensagens</h1>

                <!-- Author -->

                <?php
                while ($row = $result->fetch_assoc()) {

                    echo "<h5 class='card-header'>";
                    echo "<strong>" . $row['nome'] . "</strong>";
                    echo "</h5>";
                    echo "<div class='card-body'>";
                    echo "Mensagem: " . $row['mensagem'];
                    echo "</div>";
                }

                ?>

                <hr>
                <!-- Comments Form -->
                <div class="card my-4">
                    <?php include '_contato.php' ?>
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