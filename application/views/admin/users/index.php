<h2><?=$title?></h2>
<a href="<?php echo base_url(); ?>index.php/users/create" class="btn btn-success align-items-end">+</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nombre</th>
      <th scope="col">email</th>
      <th scope="col">funciones</th>
    </tr>
  </thead>
<?php foreach ($users as $user) :?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $user['id'];?></th>
      <td><?php echo $user['nombre']; ?></td>
      <td><?php echo $user['correo'] ?></td>
      <td>
        <div class="row">
        <a href="<?php echo base_url(); ?>index.php/users/edit/<?php echo $user['id'] ?>" class="btn btn-info">Actualizar</a>
      <?php echo form_open("index.php/categories/delete/".$user['id']); ?>
		    <input type="submit" value="Eliminar" class="btn btn-danger">
	   </form>
     </div>
  </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>