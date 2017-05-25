<form action="/user/login" method="post" role="form">

     <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $this->getInput('email') ?>">
        <?php echo $this->message('email'); ?>
    </div>

     <div class="form-group">
        <label for="">Senha</label>
        <input type="text" class="form-control" name="senha" placeholder="password" value="<?php echo $this->getInput('senha') ?>">
        <?php echo $this->message('senha'); ?>
    </div>

    <button class="btn btn-primary" type="submit">Cadastrar</button>

</form>
