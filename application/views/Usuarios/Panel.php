<!DOCTYPE html>
<html>
<style type="text/css">







.container:hover .overlay {

	height: 200%;
}

.text {
	white-space: nowrap; 
	color: white;
	font-size: 50px;
	position: absolute;

	top: 73%;
	left: 22%;
	transform: translate(-50%, -50%);


}
 

</style>
<head>

	<?=$head?>
	<title>Panel Admin</title>
</head>
<?=$Navbar?>
<font color="black" face="Calibri">
	<body style="background-color: #EBEDEF;">

		<div>
			<img    src="<?=base_url()?>/assets/images/manos.jpg"  class="img-fluid" alt="Responsive image" style="width: 100%;" >
			<div class="text">Bienvenido Administrador</div>
		</div>
		<br><br><br>



		<div class="container-fluid">
			<div class="row">
				<div   class="col-md-4">
					<div class="card text-primary border-primary"  style="width: 25rem;">
						<div class="card-header" align="center"><strong>Gestión de Usuarios</strong></div>
						<div class="card-body">

							<img class="d-block w-100" src="<?=base_url()?>/assets/images/trato.jpg" alt="Second slide">

						</div>
						<div class="card-footer" align="center" >

							<a href="<?=base_url();?>Usuario/RegistrarUsuario" class="btn btn-primary btn-block">Usuarios</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-primary border-primary"   style="width: 25rem;">
						<div class="card-header" align="center"><strong>Gestión de Productos</strong></div>
						<div class="card-body">
							<img class="d-block w-100" src="<?=base_url()?>/assets/images/Tecnologia.jpg" alt="Second slide">

						</div>
						<div class="card-footer">
							<a href="<?=base_url();?>Producto" class="btn btn-primary btn-block">Productos</a>

						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card text-primary border-primary"   style="width: 27rem;">
						<div class="card-header" align="center"><strong>Administrado-rrabbs</strong></div>
						<div class="card-body" align="center"><img class="avatar" src="<?=base_url()?>/assets/images/Logo3.png"></a>
							<p>Encargado de llevar a niveles óptimos los recursos existentes dentro de la organización. Sus funciones se basan en la Planeación, Organización, Dirección y control de las labores dentro de la empresa, manejando de manera eficaz, los recursos humanos, materiales, financieros y tecnológicos de la misma.</p>
						</div>
						<div class="card-footer">
							
							<a href="<?=base_url();?>Producto" class="btn btn outline-primary">Productos</a>
							<a href="<?=base_url();?>Usuario/RegistrarUsuario" class="btn btn-success">Usuarios</a>
						</div>
					</div>
				</div>
			</div>

			<!--Cierre del primer ROW-->

			<!--CIERRE DEL CONTAINER-->
		</div>
		<br>
		<center>
			<div class="row" >

				<div class="col-md-12">
					<div class="card text-primary border-primary">
						<div class="card-header"><h1>rrabbs</h1></div>
						<div class="card-body">
							<strong><h3>Misión: Ofrecer una amplia gama de productos para la decoración del hogar bien diseñados, funcionales y a precios tan bajos, que la mayoría de la gente pueda comprarlos</h3></strong>

						</div>

					</div>

				</div>
				<!--Cierre del segundo row-->
			</div></center><br><br><br>
			<!--CIERRE DEL CONTAINER-->
			


	</font>
</body>
<?=$Footer?>
</html>