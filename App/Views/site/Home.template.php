<form action="/user/store" method="post" role="form">


    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="nome" value="<?php echo $this->getInput('nome') ?>" >
        <?php echo $this->error('nome'); ?>
    </div>

    <div class="form-group">
        <label for="">Senha</label>
        <input type="text" class="form-control" name="senha" placeholder="informe sua senha" value="<?php echo $this->getInput('senha'); ?>">
        <?php echo $this->error('senha'); ?>
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="informe seu email" value="<?php echo $this->getInput('email'); ?>">
        <?php echo $this->error('email'); ?>
    </div>

<!--    <div class="form-group">-->
<!--        <label for="">Email</label>-->
<!--        <input type="text" class="form-control" name="email" placeholder="informe sua senha">-->
<!--    </div>-->

    <button class="btn btn-primary" type="submit">Cadastrar</button>

</form>
