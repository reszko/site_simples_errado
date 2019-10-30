<h5 class="card-header">Login</h5>
<div class="card-body">
    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) { ?>
        <p>Bem-vindo. <?php echo strtoupper($_SESSION['nome']); ?><br />
            <a href="logout.php">Deslogar</a>
        </p>

    <?php } else { ?>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="pass">Senha</label>
                <input type="password" name="pass" id="pass" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="ENTRAR" class="btn btn-success">
            </div>
            <input type="hidden" name="origem" value="login">
        </form>
        <?php 
        if (isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
        }        
        ?>
    <?php } ?>
</div>