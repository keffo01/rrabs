<!DOCTYPE html>
<html lang="es">

<head>
	<style type="text/css"></style>
	<?=$head;?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Vender</title>
</head>
<body style="background-color: #EBEDEF;">
	<?=$Navbar?>
	<br><br><br><br><br><br>
	<form id="upload" action="<?=base_url()?>Producto/guardarProduct" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 margen-divs">
				<!-- Card -->
				<div class="card">
					<!-- Name product -->
					<div class="card-header">
						<div class="card-title">
							<input class="form-control" type="text" placeholder="Título del anuncio" name="Nombre_producto">
						</div>
					</div>

					<!-- Card content -->
					<div class="card-body">
						<div>
							<select id="CategoriaVenta" name="CategoriaVenta" class="form-control"></select>
						</div>
						<br>
						<!--DRAG AND DROP -->


						<fieldset>
							<legend>Subir archivos</legend>

							<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

							<div>
								<label for="fileselect">Seleccionar archivos:</label>
								<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
								<div id="filedrag" name="fileselect[]">or drop files here</div>
							</div>

							<div id="submitbutton">
								<button type="submit">Upload Files</button>
							</div>

						</fieldset>



						<div id="messages">
							<p>Status Messages</p>
						</div>
						<!--/DRAG AND DROP -->

						<!--PRECIO DEL PRODUCTO-->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">$</span>
							</div>
							<input type="Float" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1" name="Precio">
						</div>
						<!-- Default switch -->
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitches" value="1" onclick="comprobarcheckbox();">
							<label class="custom-control-label" for="customSwitches"><h4>Negociable</h4></label>
						</div>
						<!--REGATEO DEL PRODUCTO-->
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1-Regate">$</span>
							</div>
							<input type="Float" class="form-control" placeholder="Regateo" aria-label="Regateo" aria-describedby="basic-addon1" name="Regate" id="Regate">
						</div>
						<div class="form-group purple-border">
							<label for="exampleFormControlTextarea4">Descripción del producto</label>
							<textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Descripción del producto" name="Descripcion"></textarea>
						</div>
						<!-- Button -->
						<input type="submit" value="Publicar" class="btn blue-3 btn-block text-white">

					</div>

				</div>
				<!-- Card -->
			</div> 
		</form>
		<div class="col-md-5 margen-divs">
			<div class="card"  >
				<!-- Card image -->
				<div class="card-header">
					<img class="card-img-top" src="<?=base_url()?>assets/images/recomendaciones.png" alt="Card image cap">
					<a>
						<div class="mask rgba-white-slight"></div>
					</a>
				</div>
				<!-- Card content -->
				<div class="card-body">
					<!-- Text -->
					<br><br><br>
					<p class="card-text"><h5><i class="far fa-edit"></i> Elige un nombre llamativo.</h5></p>
					<br>
					<p class="card-text"><h5><i class="far fa-edit"></i> Vende más utilizando la categoria correcta.</h5></p>
					<br>
					<p class="card-text"><h5><i class="far fa-edit"></i> Mientras más fotos, ¡Mejor!.</h5></p>
					<br><br><br><br><br><br><br>
					
					<!-- Link -->
				</div>
				<div class="card-footer">
					<p class="card-text"><strong><h4><i class="far fa-bookmark"></i> Nota</h3></strong></p>
					<p class="card-text"><h5><i class="fas fa-money-check-alt"></i> El regate no será mostrado al comprador.</h6></p>
				</div>
			</div><br>
		</div>
	</div>
	<br><br><br>

	<?=$Footer?>
	<?=$scripts?>
	<script>
		/*
filedrag.js - HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
(function() {
	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}
	// output information
	function Output(msg) {
		var m = $id("messages");
		m.innerHTML = msg + m.innerHTML;
	}
	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}
	// file selection
	function FileSelectHandler(e) {
		// cancel event and hover styling
		FileDragHover(e);
		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;
		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
		}
	}
	// output file information
	function ParseFile(file) {
		Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
			);
	}
	// initialize
	function Init() {
		var fileselect = $id("fileselect"),
		filedrag = $id("filedrag"),
		submitbutton = $id("submitbutton");
		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {
			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";
			// remove submit button
			submitbutton.style.display = "none";
		}
	}
	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}
})();
</script>
</body>
</html>
