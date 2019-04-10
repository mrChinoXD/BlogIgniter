<h2> <?=$title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('index.php/post/update'); ?>
  <div class="form-group">
  	<input type="hiden" name="id" value="<?php echo $post->id ?>">
  	<br>
    <label >Titulo de la Publicacion</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post->title ?>">
  </div>
  <div class="form-group">
    <label>Cuerpo de la publicacion </label>
     <textarea class="form-control" id="editor1" name="body" placeholder="Publicacion" value="<?php echo $post->body?>"></textarea>
  </div>
  <div class="form-group">
    <label>Categorias</label>
    <select name="category_id" class="form-control"> 
      <?php foreach ($categories as $category):?>
        <option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Subir Imagen</label>
    <input type="file" name="userfile" size="20" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Publicar</button>
</form>