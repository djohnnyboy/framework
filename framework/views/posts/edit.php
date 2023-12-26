<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Post something</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ;?>">
          <div class="form-group">
            <label>Post title</label> 
            <input type="text" name="title" 
            value="<?php echo $viewmodel['title']; ?>" class="form-control">
          </div>
           <div class="form-group">
            <label>Body</label> 
            <textarea name="body" class="form-control"><?php echo $viewmodel['body']; ?></textarea>
          </div>
           <div class="form-group">
            <label>Link</label> 
            <input type="text" name="link" class="form-control" value="<?php echo $viewmodel['link']; ?>">
          </div>
          <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </form>
      </div>
  </div>
