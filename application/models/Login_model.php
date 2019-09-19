<?php
class Login_model extends CI_Model{

	public function LoginUser($username,$pass){

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('Nombre_usuario',$username);
		$this->db->where('Password',$pass);
		$login = $this->db->get();
		
		return $login->row();
		
	}

	public function Mostrar_post(){
		$pa="Call sp_post()";
		$resultado=$this->db->query($pa);
		$elementos = $resultado->result();

		$resultado->next_result(); // Dump the extra resultset.
		$resultado->free_result(); // Does what it says.

		return $elementos;
	}

	public function Mostrar_cat_celulares(){
		$pa="Call sp_post_celular()";
		$resultado = $this->db->query($pa);
		$celus = $resultado->result();
		$resultado->next_result(); // Dump the extra resultset.
		$resultado->free_result(); // Does what it says.
		return $celus;
	}
	public function Mostrar_Vehiculos(){
		$pa = "Call sp_post_Vehiculo()";
		$resultado = $this->db->query($pa);
		return $resultado->result();
	}

}