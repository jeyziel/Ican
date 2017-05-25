<form action="/post/update/<?php echo $post->id ?>" method="post" role="form">


    <div class="form-group">
        <label for="">Titulo</label>
        <input type="text" class="form-control" name="title" placeholder="title" value="<?php if($input = $this->getInput('title'))
            {
                echo $input;
            }else{
                echo $post->title;
            }
            ?>">
        <?php echo $this->message('title'); ?>
    </div>

    <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" class="form-control"><?php echo $post->content ?></textarea>
        <?php echo $this->message('content'); ?>
    </div>

    <div class="form-group">
        <label for="title" class="control-label">Categories</label>
            <div class="checkbox">
               <?php foreach ($categories as $cat): ?>
                <label>
                    <input type="checkbox" name="category_id[]" value="<?php echo $cat->id ?>"
                    <?php foreach ($post->category as $item)
                        echo ($cat->id == $item->id) ? 'checked' : '';
                    ?>
                    >
                    <?php echo $cat->name; ?>
                </label>
               <?php endforeach; ?>
            </div> 
            <?php echo $this->message('category_id'); ?>           
    </div>

   

<!--    <div class="form-group">-->
<!--        <label for="">Email</label>-->
<!--        <input type="text" class="form-control" name="email" placeholder="informe sua senha">-->
<!--    </div>-->

    <button class="btn btn-primary" type="submit">Cadastrar</button>

</form>
