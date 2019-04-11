<?php echo validation_errors(); ?>
<?php echo form_open('index.php/comments/create'); ?>
  <div class="col-md-4">
  <div class="form-group">
    <label >Autor</label>
    <input type="text" class="form-control" name="name" placeholder="">
  </div>
  <div class="form-group">
    <label>Comentario</label>
     <textarea class="form-control" id="" name="body" placeholder="Publicacion"></textarea>
     <input type="hidden" name="idpost" value="<?php echo $post->id?>">
  </div>
  <button type="submit" class="btn btn-primary">Publicar</button>
  </div> 
</form>