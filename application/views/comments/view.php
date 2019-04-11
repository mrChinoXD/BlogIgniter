<?php foreach ($comments as $comment) :?>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<h3>Autor: <small><?php echo $comment['usuario']; ?></small></h3>
			<small class="post-date">Creado el: <?php echo $comment['create_at']; ?></small><br>
			<p><?php echo word_limiter($comment['body'],100); ?></p>
		</div>
	</div>
	<hr>
<?php endforeach; ?>