<?php
class Usuario_model extends CI_Model{

	public function mostrarUser(){
$this->load->library('encryption');

	}

	public function insertarUser($user){

		$usuario=$this->db->insert('usuarios',$user);
		if($usuario){
			return '200';
		}else{
			return '500';
		}
	}

public function listaUser(){
	$this->db->select('a.*,b.*');
	$this->db->from('usuarios a');
	$this->db->join('roles b', 'a.Rol_id = b.Id_rol');
	$user = $this->db->get();
	return $user->result_array();

}
public function extracUsuario($id){
	$this->db->where('Id_usuario',$id);
	$pro = $this->db->get('usuarios');
	return $pro->result_array();
}
public function Roles(){
	$select = $this->db->get('roles');
	return $select->result_array();
}
public function editarUser(){

	$id = $this->input->post('id');
	$name = $this->input->post('name');
	$ape = $this->input->post('ape');
	$user  = $this->input->post('user');
	$email = $this->input->post('email');
	 $hola = $this->encryption->encrypt($pass = $this->input->post('pass'));
	$rol =$this->input->post('rol');

	$this->db->set('Nombre',$name);
	$this->db->set('Apellido',$ape);
	$this->db->set('Nombre_usuario',$user);
	$this->db->set('Email',$email);
	$this->db->set ('Password',$hola);
	$this->db->set('Rol_id',$rol);
	
	$this->db->where('Id_usuario',$id);
	$result=$this->db->update('usuarios');
	if($result)
	{
		return 'Orale';
	}
	else
	{
		return 'Nell perro';
	}
}
public function eliminarUser($id){
	$this->db->where('Id_usuario', $id);
	$result=$this->db->delete('usuarios');
	if($result)
	{
		return 'Exito';
	}
	else
	{
		return 'fail';
	}
}
}