<div class="panel panel-default">
 	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	    <div class="panel-heading">
	        <h3 class="panel-title">
	        	<a href="<?php echo ROOT_PATH; ?>posts/add">
				   	Post Something
				</a>
	        </h3>
	    </div>
  	<?php endif;?>
    <div class="panel-body">
        <?php foreach($viewmodel as $item) : ?>
			<div class="well">
				<h3><?php echo $item['title']; ?></h3>
				<small><?php echo $item['create_date']; ?></small>
				<hr />
				<p><?php echo $item['body']; ?></p>
				<br />
				<a class="btn btn-default" href="https://<?php echo $item['link']; ?>">Go To Website</a>
				<a href="posts/show/<?php echo $item['id']?>">Show post</a>
			</div>
		<?php endforeach; ?>
    </div>

 </div>