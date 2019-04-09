<?php 
	defined('BASEPATH') or  exit('No direct script access allowed'); ?>
<div class="row">
	<div class='col-6 justify-content-center'>
		<?php echo validation_errors(); ?>
		<?php echo form_open('login'); ?>
		<label>Nombre de usuario</label>
		<input type="text" name="name" class="form-control" /></br>
		<label>Contraseña</label>
		<input type="text" name="password" class="form-control"/></br>
		<input type="submit" name="submit" value='Login' class="form-control btn btn-primary"/>
		<?php echo form_close(); ?>
	</div>
</div>