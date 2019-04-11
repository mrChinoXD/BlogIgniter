<h2> <?=$title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('index.php/categories/create'); ?>
  <div class="form-group">
    <label >Nombre de la categoria</label>
    <input type="text" class="form-control" name="name" placeholder="">
     <button type="submit" class="btn btn-primary mt-3">Publicar</button>
  </div>
</form>
 