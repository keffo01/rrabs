<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model','LM',TRUE);
	}

	public function Index(){
		switch ($this->session->userdata('Rol_id')) {
			case '':

			$ver=$this->LM->Mostrar_post();
			$cel = $this->LM->Mostrar_cat_celulares();
			$car = $this->LM->Mostrar_Vehiculos();
			$contenido['car'] = $car;
			$contenido['cel']=$cel;
			$contenido['ver']=$ver;
			$contenido['Error'] = $this->session->flashdata('error');
			$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
			$contenido['Head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
			$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
			$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
			$contenido['reciente'] = $this->load->view('Usuarios/UltimasPublicadas',FALSE,TRUE, $contenido);
			$contenido['categoria'] = $this->load->view('contenidos/Categorias',FALSE,TRUE);
			$contenido['carrusel'] = $this->load->view('contenidos/Carrusel',FALSE,TRUE);
			$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
			$this->load->view('InicioSesion',$contenido);
			break;
			case 1:
			redirect(base_url().'Login/PanelAdmin');
			
			break;
			case 2:
			redirect(base_url().'Login/inicioRrabbs');
			break;

		}
	}
	public function inicioRrabbs(){
		
		$ver=$this->LM->Mostrar_post();
		$cel = $this->LM->Mostrar_cat_celulares();
		$car = $this->LM->Mostrar_Vehiculos();
		$contenido['car'] = $car;
		$contenido['cel']=$cel;
		$contenido['ver']=$ver;
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['Head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['reciente'] = $this->load->view('Usuarios/UltimasPublicadas',FALSE,TRUE);
		$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);

		$this->load->view('Usuarios/Inicial',$contenido);
		
		


	}

	public function PanelAdmin(){
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/Panel',$contenido);
	}
	

	public function IniciarSesion(){

		$Usuario =$this->input->post('N_usuario');
		$Pass = $this->input->post('Pass');
		$logueo = $this->LM->LoginUser($Usuario,$Pass);
		if($logueo){
			$datos = array(
				'logueado' => TRUE,
				'Id_usuario' => $logueo->Id_usuario,
				'Nombre_usuario' => $logueo->Nombre_usuario,
				'Rol_id' => $logueo->Rol_id	
			);
			$this->session->set_userdata($datos);
			$this->index();
		}else{
			$this->session->set_flashdata('error','Nombre de usuario o contraseña incorrectos');
			redirect(base_url().'Login');
		}
	}

	public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Login');
	}

}

?>