<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Post_model','PMD',TRUE);

	}

	public function Vender(){
		if ($this->session->userdata('Rol_id') == FALSE) {
			redirect(base_url().'Login');
		}
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['Mate'] = $this->load->view('contenidos/materialize', FALSE,TRUE);
		$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);

		$this->load->view('Producto/Vender',$contenido);
	}
	public function Publicacion(){

		$ver= $this->PMD->extraerPost($_REQUEST['post']);
		$info['ver'] = $ver;
		$info['Error'] = $this->session->flashdata('error');
		$info['user'] = $this->session->userdata('Nombre_usuario');
		$info['Navbar'] = $this->load->view('contenidos/Navbar',$info);
		$info['Head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$info['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$info['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$info['reciente'] = $this->load->view('Usuarios/UltimasPublicadas',FALSE,TRUE);
		$info['categoria'] = $this->load->view('contenidos/Categorias',FALSE,TRUE);
		$info['carrusel'] = $this->load->view('contenidos/Carrusel',FALSE,TRUE);
		$info['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$this->load->view('Usuarios/post', $info);
	}
	public function Buscar(){
		$Busqueda=$this->input->get('Busqueda');
		$ver=$this->PMD->Buscar($Busqueda);

		$contenido['ver']=$ver;
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['Footer'] = $this->load->view('contenidos/Footer',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/Buscar', $contenido);
	}




	public function Categoria(){
		$Categoria=$this->input->get('Categoria');
		$ver=$this->PMD->Categoria($Categoria);

		$contenido['ver']=$ver;
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/Buscar', $contenido);
	}

}
?>