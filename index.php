<?php include("_header.php"); ?>

<?php 
		if(isset($_POST['send_contact'])){
			$nombre = $_POST['nombre'];
			$category_id = $_POST['category_id'];
			$category2_id = $_POST['category2_id'];
			$vete_id = $_POST['vete_id'];
			$vete2_id = $_POST['vete2_id'];
			$nova_id = $_POST['nova_id'];
			$nova2_id = $_POST['nova2_id'];

			if(isset($nombre) && isset($category_id) && isset($category2_id)&& isset($vete_id)&& isset($vete2_id)&& isset($nova_id)&& isset($nova2_id)){
				if($category2_id!= $category_id && $vete2_id != $vete1_id && $nova2_id != $nova_id){
						$sql = "INSERT INTO reviewa (manager_id,manager2_id,vete_id,vete2_id,nova_id,nova2_id,nombre) VALUES ('".$category_id."','".$category2_id."','".$vete_id."','".$vete2_id."','".$nova_id."','".$nova2_id."','".$nombre."')";
					//echo $sql;
					if(mysqli_query($mysqli, $sql)) {
						//Tot correcte
						$okey = "Añadido correctamente";
					}else{
						//Si és produeix un error
						$error = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}
				else{
					$error = "No puedes escoger la misma opción en todos los campos";
				}
			}else{
				echo "Faltan datos";
			}
		}
	?>
    <!-- Page Content -->
<div class="container-fluid finisher-header flex-shrink-0">
	<video src="img\Above Clouds.webm" muted loop autoplay></video>
	<div class="row my-4">
	  <div class="col-md-6 offset-md-3">
		<div class="card p-3 text-center">
			<form action="index.php" method="post">
		  <fieldset>
		  	<?php if(isset($error)) echo "<p class='alert alert-danger'>".$error."</p>"; ?>
			<?php if(isset($okey)) echo "<p class='alert alert-success'>".$okey."</p>"; ?>
			<h2>Añadir valoración</h2>
	
			<!-- Name input-->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="nombre">Nombre</label>
			  <div class="col-md-9">
				<input id="nombre" name="nombre" type="text" placeholder="calcetin" class="form-control" required>
			  </div>
			</div>

			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="category_id">Selecciona tu encargado preferido</label>
			  <div class="col-md-9">
			  <select name="category_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM managers';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
		
				?>
				</select>
			  </div>
			</div>

			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="category2_id">Selecciona tu segundo encargado preferido</label>
			  <div class="col-md-9">
			  <select name="category2_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM managers';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
				?>
				</select>
			  </div>
			</div>

			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="vete_id">Selecciona tu veterano (> 1 año) preferido</label>
			  <div class="col-md-9">
			  <select name="vete_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM veteranos';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
				?>
				</select>
			  </div>
			</div>
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="vete2_id">Selecciona tu 2ndo veterano preferido</label>
			  <div class="col-md-9">
			  <select name="vete2_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM veteranos';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
				?>
				</select>
			  </div>
			</div>
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="nova_id">Selecciona tu novato (< 1 año)) preferido</label>
			  <div class="col-md-9">
			  <select name="nova_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM novatos';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
				?>
				</select>
			  </div>
			</div>
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="nova2_id">Selecciona tu 2ndo novato preferido</label>
			  <div class="col-md-9">
			  <select name="nova2_id" class="form-select" required>
				  <option value=""></option>				
				  <?php
				  $sql_cat = 'SELECT * FROM novatos';
				  $resultado_cat = mysqli_query($mysqli, $sql_cat);
				  while ($row_cat = mysqli_fetch_assoc($resultado_cat)):
					?>	
						<option value="<?= $row_cat['nombre'] ?>"><?= $row_cat['nombre'] ?></option>
				<?php
					endwhile;
				?>
				</select>
			  </div>
			</div>
						<!-- Form actions -->
			<div class="row mb-3">
			  <div class="col-md-12 text-right">
				<button type="submit" name="send_contact" value="send_contact" class="btn btn-warning">Enviar</button>
			  </div>
			</div>
			</fieldset>
		  </form>
		</div>
		  
	  </div>
	</div>
</div>

<?php include("_footer.php"); ?>