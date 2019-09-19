<!DOCTYPE html>
<html lang="es">

<head>
	<?=$Head;?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>POST</title>
</head>
<body style="background-color: #EBEDEF;">
	<?=$Navbar?>
	
	<div class="row" style="margin-top: 100px; margin-left : 12px;">
		<div class="col-sm-5 col-md-8 offset-md-0">
			<div class="card">
				<div class="card-body">
					<!--Carousel Wrapper-->
					<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
					<h4 class="carousel-caption d-none d-md-block "><?=$ver->Producto?></h4>
						<!--Slides-->
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-block w-100" src="<?=base_url()?>upload/<?=$ver->Imagen1?>"
								alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="<?=base_url()?>/assets/images/samsung.jpg"
								alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="<?=base_url()?>/assets/images/sun.jpg"
								alt="Third slide">
							</div>
						</div>
						<!--/.Slides-->
						<!--Controls-->
						<a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a><br>
						<!--/.Controls-->
						<ol class="carousel-indicators">
							<li data-target="#carousel-thumb"  data-slide-to="0" class="active">
							</li>
							<li data-target="#arousel-thumb"   data-slide-to="1"  >
							</li>
							<li data-target="#carousel-thumb "  data-slide-to="2"  >
							</li>
						</ol>
					</div>
					<!--/.Carousel Wrapper-->	
					<!-- Text -->
					<div class="text-center">
						<p class="card-text"><?=$ver->Descripcion?></p>
					<span>USD: $</span><?=$ver->Precio?><br>
					<span>Categoria: </span><?=$ver->Tipo_categoria?>
					</div>
				</div>
			</div>
			<!-- Card -->
		</div> 



		<!--INFORMACION DEL VENDEDOR-->
		 <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" rc="<?=base_url()?>upload/<?php echo $ver->foto?> alt="card image"></p>
                                    <h4 class="card-title"><?=$ver->Nombre?></h4>
                                    <p class="card-text"><?=$ver->Email ?></p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?=$ver->Nombre_usuario ?></h4>
                                    <p class="card-text">Es un usuario promedio, con un total de 67 ventas hasta el dia de ahora <br>
                ★
				★
				★
				★
				★
                                    	

                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- ./Team member -->
			<!--CARD-->
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Mensaje</h5>
				</div>
				<div class="card-body">
					<h6 class="card-subtitle mb-2 text-muted">Escribe aquí:</h6>
					<input type="text" name="enviar" class="form-control">
					
				</div><div class="card-footer">
						<a href="#" class="card-link btn btn-primary btn-block">Enviar Mensaje</a>
	
					</div>
			</div>
			<!--FIN-->
		</div>
	</div>
	<br><br><br>

	<?=$scripts?>
	<?=$Footer?>
</body>
</html>
