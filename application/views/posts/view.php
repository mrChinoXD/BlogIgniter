<h2><?php echo $post->title; ?></h2>
<small class="post-date">Creado el: <?php echo $post->create_at;?></small><br>
<img class="img-thumbnail" src="<?php echo site_url();?>/assets/img/posts/<?php echo $post->post_image;?>">
<div class="post-body">
	<?php echo $post->body; ?>
</div>
<hr>
<div class="row">
<a href="<?php echo base_url(); ?>index.php/post/edit/<?php echo $post->slug ?>" class="btn btn-info m-2">Actualizar</a>
<?php echo form_open("index.php/post/delete/".$post->id); ?>
<input type="submit" value="Eliminar" class="btn btn-danger m-2">
</form>
</div>