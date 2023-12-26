<div>

    <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <a class="btn btn-success btn-share" 
           href="<?php echo ROOT_PATH; ?>posts/add">   
            Post Something
        </a>
    <?php endif;?>
        <div class="well">
            <h3><?php echo $viewmodel['title']; ?></h3>
            <small><?php echo $viewmodel['create_date']; ?></small>
            <hr />
            <p><?php echo $viewmodel['body']; ?></p>
            <br />
            <a class="btn btn-info" href="<?php echo ROOT_PATH ;?>posts/edit/<?php echo $viewmodel['id'] ?>">edit</a>
            <a class="btn btn-danger" href="<?php echo ROOT_PATH ;?>posts/delete/<?php echo $viewmodel['id'] ?>">delete</a>
        </div>
</div>