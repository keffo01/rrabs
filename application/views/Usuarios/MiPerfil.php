<!DOCTYPE html>
<html>
<head>
	<?=$Navbar?>

	<?=$head?>
	<title>Mi Perfil</title>

	<style >
	.redonly {
		width:200px;
		height:200px;
		border-radius:500px;
	}


	form{ width:250px; margin:0 auto; padding:10px; border: 1px solid #d9d9d9;}
	form p, form input[type = "submit"]{text-align:center; font-size:20px;}


input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
label{ color:grey;}

.clasificacion{
	direction: rtl;
	unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label{color:orange;}
input[type = "radio"]:checked ~ label{color:orange;}


</style>

</head><br><br><br><br><br>
<body style="background-color: #EBEDEF;">
	<h1 align="center">Mi Perfil</h1>
	<div class="container-fluid">
		<div class="row">
			<!--PRIMERA CARD-->
			<div class="col-md-4">
				<div class="card"  style="width: 25rem;" >
					<div class="card-header"><strong><?=$perfil->Nombre;?>
					<?=$perfil->Apellido;?></strong>
				</div>
				<div class="card-body" align="center">
					
					<img class="redonly" src="<?=base_url()?><?=$perfil->foto;?>" >

					<figcaption class="text-center">@<?=$perfil->Nombre_usuario;?></figcaption> 
				</div>
				<div class="card-footer" align="center">Ranting
					<p class="clasificacion">
						<input id="radio1" type="radio" name="estrellas" value="5" checked=""><label for="radio1">★</label>
						<input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
						<input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
						<input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
						<input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
					</p>
				</div>
			</div>
		</div>
		<!--SIGUIENTE CARD-->

		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><strong>Publicaciones</strong>
				</div>
				<div class="card-body">
 				<table  align="center" class="table table-bordered table-striped table-hover">
						<thead class="thead-dark">
							<ul>
								<th>Publicación</th>
								<th>Nombre</th>
								<th>Precio</th>	
								<th>Descripción</th>
								<th>Regate</th>
							</ul>
						</thead>
						<?php $contador=1;?> 
							<?php foreach($post as $h):   ?>
								

 								<tr>
 									<td><?=$contador;?></td>
 									<td><?=$h->Nombre; ?></td>
 									<td><?=$h->Precio; ?></td>
 									<td><?=$h->Descripcion; ?></td>
 									<td><?=$h->Regate; ?></td>
 								</tr>
						 <?php $contador ++;?>
 							<?php endforeach; ?>
 								
					</table>
				</div>

				<div class="card-footer">
					<p>@ <?=$perfil->Nombre_usuario;?></p>
				</div>
			</div>
		</div>
		<!--fin de la segunda card-->
	</div>
</div>
<?=$scripts?>
</body>
</html>