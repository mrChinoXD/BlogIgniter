<h2><?php echo $post->title; ?></h2>
<small class="post-date">Creado el: <?php echo $post->create_at;?></small><br>
<img class="img-thumbnail" src="<?php echo site_url();?>/assets/img/posts/<?php echo $post->post_image;?>">
<div class="post-body">
	<?php echo $post->body; ?>
</div>
<hr>
<div class="row">
</form>
</div>