<h5 class="card-header">Contato:</h5>
<div class="card-body">
    <form method="post" action="index.php" autocomplete="off">
        <div class="form-group">
            <label for="nome"></label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Seu Nome" autocomplete="off">
        </div>
        <div class="form-group">
            <textarea name="mensagem" class="form-control" rows="3" placeholder="Sua Mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <input type="hidden" name="origem" value="contato">
    </form>
    <?php 
    if (!empty($resultado_contato)) {
        echo $resultado_contato;
    }
    ?>
    <hr>
    <p><a href="mensagens.php">Veja as mensgens já enviadas!</a></p>
</div>