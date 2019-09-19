<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('usuario_model','UM',TRUE);
		$this->load->library('encryption'); 

	}
	
	public function Index(){
		
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['Mate'] = $this->load->view('contenidos/materialize', FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/Dashboard',$contenido);
	}
	public function RegistrarUsuario(){
		if($this->session->userdata('Rol_id') == FALSE || $this->session->userdata('Rol_id') !=1){
			redirect('Login');
		}
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$contenido['CarA'] = $this->load->view('Usuarios/CarAdmin',FALSE,TRUE);
		$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$this->load->view('Usuarios/Registrarse',$contenido);
	}

	
	public function guardarUser(){
	$path = "upload/";
		if(isset($_FILES['profile'])){

    //almacenamos las propiedades de las imagenes
			$name_array = $_FILES['profile']['name'];
			$tmp_name_array = $_FILES['profile']['tmp_name'];
			$type_array = $_FILES['profile']['type'];
			$size_array = $_FILES['profile']['size'];
			$error_array = $_FILES['profile']['error'];

    //recorremos el array de imagenes para subirlas al simultaneo
			for($i = 0; $i < count($tmp_name_array); $i++){

				if(move_uploaded_file($tmp_name_array[$i], "upload/".$name_array[$i])){

					echo "<img src='".$path.$name_array[$i]."'> Se ha subido exitosamente.<br>";

				}
				else
				{
            //si ocurrio algun problema entonces
					echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
				}

				
			}
		}
		

		$usuarios = array('Nombre' => $this->input->post('Nombre'),
			'Apellido' => $this->input->post('Apellido'), 
			'Nombre_usuario' => $this->input->post('Nombre_usuario'),
			'Email' => $this->input->post('Email'),
			 'Password' => $this->input->post('Password'),
			'foto' => $path.$name_array[0],
			'Rol_id'=> 2
		);

		$this->UM->InsertarUser($usuarios);
		redirect('Usuario/RegistrarUsuario',$contenido);
	}
	public function mostrarUser(){
		$Usuario = $this->UM->listaUser();
		$contador =1;
		foreach ($Usuario as $user) {
			echo '<tr>'.
			'<td>'.$contador.'</td>'.
			'<td>'.$user["Nombre"].'</td>'.
			'<td>'.$user["Apellido"].'</td>'.
			'<td>'.$user["Nombre_usuario"].'</td>'.
			'<td>'.$user["Email"].'</td>'.
			'<td>'.'Za095strrabbs03spl'.'</td>'.

			'<td>'.$user["Tipo_rol"].'</td>'.
			'<td>'.'<button class="btn btn-success" data-toggle="modal" data-target="#cambiar" onclick="llamarCampos('.$user["Id_usuario"].')">Actualizar</button></td>'.
			'<td>'.'<button class="btn btn-danger" data-toggle="modal"   onclick="deleteUser('.$user["Id_usuario"].')">Eliminar</button></td>'.

			'</tr>'.
			$contador ++;
		}
	}
	public function extraerUser(){


		$User = $this->UM->extracUsuario($_REQUEST['id']);
		$Roles = $this->UM->Roles();
		
		//$key = $this->encryption->decrypt(['Password']);
		foreach($User as $b){
			$Cifrar = $this->encryption->decrypt($b['Password']);
			$llamar = $b['Password'];
			if($Cifrar){
				echo $Cifrar;
			}else{
				echo $llamar;
			}	 

			
			echo '<div class="card-block">'.

			'<form id="Llenar" >'.
			'<div class="form-group row">'.

			'<div class="col-sm-10">'.
			'<input type="hidden" class="form-control" id="id" name="id"  value="'.$b["Id_usuario"].'">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Nombre</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="name" name="name" value="'.$b["Nombre"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Apellido</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="des" name="ape" value="'.$b["Apellido"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Usuario</label>'.
			'<div class="col-sm-10">'.

			'<input type="text" class="form-control" id="precio" name="user" value="'.$b["Nombre_usuario"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Email</label>'.
			'<div class="col-sm-10">'.

			'<input type="email" class="form-control" id="regate" name="email" value="'.$b["Email"].'" required  maxlength ="25" minlength="2">'.
			'</div>'.
			'</div>'.
			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Contraseña</label>'.
			'<div class="col-sm-10">'.
			'<input type="text" class="form-control" id="regateo" name="pass" value="'.$Cifrar.'" required  maxlength ="25" minlength="2">'.

			'</div>'.
			'</div>'.

			'<div class="form-group row">'.
			'<label class="col-sm-2 col-form-label">Seleccionar Rol</label>'.
			'<div class="col-sm-10">'.
			'<select name="rol" id="select" class="form-control">';
			foreach ($Roles as $rol) {
				echo '<option value="'.$rol["Id_rol"].'"';echo $rol["Id_rol"]==$b["Rol_id"] ? "selected" : "";echo '>'.$rol["Tipo_rol"].'</option>';
			}
			echo '</select>'.
			'</div>'.
			'</div>'.

			'</form>'.
			'</div>';
		}
	}
	public function actualizarUser(){


		if($this->UM->editarUser($edit)){
			echo 'Exito';

		}else{
			echo 'Nada bebe';
		}

	}
	public function borrarUser(){
		$data = $this->UM->eliminarUser($_REQUEST['id']);
		echo $data;

	}
	
	
	public function SelectRol(){
		$dato = $this->UM->Roles();
		echo "<option value='0'>Elija un rol</option>";
		foreach ($dato as $d) {
			echo "<option value='".$d['Id_rol']."'>".$d['Tipo_rol']."</option>";

		}
	}

}
?>