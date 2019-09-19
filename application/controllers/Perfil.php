<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Perfil_model', 'MP', TRUE);
		$this->load->library('session');

	}
	public function index(){
		$user = $this->session->userdata('Id_usuario');
		$contenido['perfil'] =$this->MP->Perfil($user);
		$contenido['post']=$this->MP->Post($user);
		
		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/MiPerfil',$contenido);
	}
	public function tablaPost(){
		$user = $this->session->userdata('Id_usuario');
		

		$contenido['user'] = $this->session->userdata('Nombre_usuario');
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',$contenido);
		$contenido['Navbar'] = $this->load->view('contenidos/Navbar',FALSE,TRUE);
		$contenido['head'] = $this->load->view('contenidos/Head',FALSE,TRUE);
		$contenido['scripts'] = $this->load->view('contenidos/Scripts',FALSE,TRUE);
		$this->load->view('Usuarios/MiPerfil',$contenido);

	}

}
?>