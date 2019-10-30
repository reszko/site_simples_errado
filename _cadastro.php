<h5 class="card-header">Cadastre-se</h5>
<div class="card-body">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Seu nome">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="pass">Senha</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="CADASTRAR" class="btn btn-success">
        </div>
        <input type="hidden" name="origem" value="cadastro">
    </form>
    <?php 
    if (!empty($resultado_cadastro)) {
        echo $resultado_cadastro;
    }
    ?>
</div>