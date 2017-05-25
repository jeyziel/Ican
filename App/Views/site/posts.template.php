<div class="container">

    <h1 class="h1">
       @title
        <a href="/post/create" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-plus-sign"></i> New post
        </a>
      
    </h1>
    <h2><?php echo $this->message('msg'); ?></h2>
    <?php foreach ($posts as $post): ?>
        <h3 class="h3">
            <a href="/post/"></a>
            <?php echo $post->title; ?>
        </h3>
        <p class="text-justify">
            <?php echo $post->content; ?>
        </p>
        <p>
            <strong></strong><br/>
            <strong>Categorias : 
                <?php 
                    foreach($post->category as $cat)
                    {
                        echo $cat->name;
                        echo "&nbsp";
                    }
                  ?>  
            </strong>

            <span class="pull-right">
                <a href="/post/edit/<?php echo $post->id ?>" class="btn btn-warning btn-xs">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>
                <a href="/post/delete/<?php echo $post->id; ?>" class="btn btn-danger btn-xs"
                   onclick="return confirm('Deletar este post?')">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </span>  
        </p>
        <hr/>
    <?php endforeach; ?>

</div>