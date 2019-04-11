<h2> <?=$title; ?></h2>
<?php echo form_open('index.php/categories/update'); ?>
  <div class="form-group">
    <input class="form-control" type="hiden" name="id" value="<?php echo $categories->id ?>" readonly>
  </div>
  <div class="form-group">
    <label>Nombre de la categoria</label>
    <input  class="form-control" type="text" name="name" placeholder="Nombre" value="<?php echo $categories->name;?>">
  </div>
  <button type="submit" class="btn btn-primary">Publicar</button>
</form>