<h2><?=$title?></h2>
<?php foreach ($posts as $post) :?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-thumbnail" src="<?php echo site_url();?>/assets/img/posts/<?php echo $post['post_image'];?>">
		</div>
		<div class="col-md-9">
			<h3><?php echo $post['title']; ?></h3>
			<small class="post-date">Creado el: <?php echo $post['create_at']; ?></small><br>
			<?php echo word_limiter($post['body'],25); ?>
			<p><a href="<?php echo base_url('index.php/post/view/'.$post['slug']); ?>">Leer Mas...</a></p>
		</div>
	</div>
<?php endforeach; ?>
<nav aria-label="Page navigation">
<ul class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</ul>
</nav>