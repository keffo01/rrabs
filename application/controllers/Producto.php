<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto_model', 'PM', TRUE);

	}
	public function index(){
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Producto/product',$contenido);

	}

	public function guardarProduct(){
		
		if(isset($_FILES['fileselect'])){
			$path = "upload/";
    //almacenamos las propiedades de las imagenes
			$name_array = $_FILES['fileselect']['name'];
			$tmp_name_array = $_FILES['fileselect']['tmp_name'];
			$type_array = $_FILES['fileselect']['type'];
			$size_array = $_FILES['fileselect']['size'];
			$error_array = $_FILES['fileselect']['error'];
			

    //recorremos el array de imagenes para subirlas al simultaneo
			$i = 0;
			$f =count($tmp_name_array);
			$aux = array();
			while( $i < $f ){

				if(move_uploaded_file($tmp_name_array[$i], "upload/".$name_array[$i])){

					echo "<img src='".base_url().$path.$name_array[$i]."'> Se ha subido exitosamente.<br>";
					

				}
				else
				{
            //si ocurrio algun problema entonces
					echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
				}

				$i++;
			}
		}
		
		$user = $this->session->userdata('Id_usuario');


		$products = array('Nombre' => $this->input->post('Nombre_producto'),
			'Descripcion' => $this->input->post('Descripcion'), 
			'Precio' => $this->input->post('Precio'),
			'Regate' => $this->input->post('Regate'),
			'Categoria_id' => $this->input->post('CategoriaVenta'),
			'Usuario_id' => $user,
			'Imagen1' =>NULL,
			'Imagen2' => NULL,
			'Imagen3' => NULL,
			'Imagen4' => NULL,
			'Imagen5' => NULL,
			'Imagen6' => NULL,
			'Imagen7' => NULL,
			'Imagen8' => NULL,
			'Imagen9' => NULL,
			'Imagen10' => NULL
		);

		for($i=1; $i <= count($name_array);$i++) {
			$aux['Imagen'.$i] = $name_array[$i-1];
		}

		$products = array_merge($products,$aux);


		$dato = $this->PM->registrarProduct($products);

		redirect('Login');
	}
	public function llenarCategoria(){
		$dato = $this->PM->Categoria();
		echo "<option value='0'>Elija una categoria categoria</option>";
		foreach ($dato as $c) {
			echo "<option value='".$c['Id_categoria']."'>".$c['Tipo_categoria']."</option>";

		}
	}
	
	public function mostrarProduct(){
		
		$product = $this->PM->listaProduct();
		$contador =1;
		foreach ($product as $result) {
			echo '<tr>'.
			
			'<td>'.$contador.'</td>'.
			'<td>'.$result["Nombre"].'</td>'.
			'<td>'.$result["Descripcion"].'</td>'.
			'<td>'.$result["Precio"].'</td>'.
			'<td>'.$result["Regate"].'</td>'.
			'<td>'.$result["Tipo_categoria"].'</td>'.

			'<td>'.'<button class="btn btn-mat btn-success" data-toggle="modal" data-target="#modal" onclick="extraerCampos('.$result["Id_producto"].')">Editar</button></td>'.

			'<td>'.'<button class="btn btn-mat btn-danger" data-toggle="modal"   onclick="deleteProduct('.$result["Id_producto"].')">Eliminar</button></td>'.

			'</tr>'.
			$contador ++;

		}

	}
	
	public function extraerProduct(){
		$dato = $this->PM->extracProduct($_REQUEST['id']);
		$Categoria = $this->PM->Categoria();

		foreach ($dato as $b){

			echo '<div class="card-block">'.

			'<form id="Llenar" >'.
			'<div class="form-group row">'.

			'<div class="col-sm-10">'.
			'<input type="hidden" class="form-control" id="id" name="id"  value="'.$b["Id_producto"].'">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Nombre del producto</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="name" name="name" value="'.$b["Nombre"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Descripción</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="des" name="des" value="'.$b["Descripcion"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Precio del producto</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="precio" name="precio" value="'.$b["Precio"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Regate</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="regate" name="regate" value="'.$b["Regate"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.

			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Categoria</label>'.
			'<div class="col-sm-10">'.
			'<select name="select" id="select" class="form-control">';
			foreach ($Categoria as $category) {
				echo '<option value="'.$category["Id_categoria"].'"';echo $category["Id_categoria"]==$b["Categoria_id"] ? "selected" : "";echo '>'.$category["Tipo_categoria"].'</option>';
			}
			echo '</select>'.
			'</div>'.
			'</div>'.

			'</form>'.
			'</div>';
		}
	}
	public function editarProduct(){
		if($this->PM->actualizarProduct()){
			echo "Exito";
		}else{
			echo "Nell";
		}
	}
	public function borrarProduct(){
		$data = $this->PM->eliminarProduct($_REQUEST['id']);
		echo $data;
	}
	
}

?>