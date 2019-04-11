<h2><?=$title?></h2>
<a href="<?php echo base_url(); ?>index.php/categories/create" class="btn btn-success align-items-end">+</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nombre</th>
      <th scope="col">funciones</th>
    </tr>
  </thead>
<?php foreach ($categories as $category) :?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $category['id'];?></th>
      <td><?php echo $category['name']; ?></td>
      <td>
        <div class="row">
        <a href="<?php echo base_url(); ?>index.php/categories/edit/<?php echo $category['id'] ?>" class="btn btn-info">Actualizar</a>
      <?php echo form_open("index.php/categories/delete/".$category['id']); ?>
		    <input type="submit" value="Eliminar" class="btn btn-danger">
	   </form>
     </div>
  </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>