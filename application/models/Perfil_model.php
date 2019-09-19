<?php
class Perfil_model extends CI_Model{


	public function Perfil($user){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('Id_usuario ='.$user);

		$result = $this->db->get();


		
		return $result->row();
	}
	public function Post($user){
		$this->db->select('a.*,b.Id_usuario');
		$this->db->from('productos a');
		
 		$this->db->join('usuarios b', 'a.Usuario_id = b.Id_usuario');

		$this->db->where('Usuario_id ='.$user); 
		$result = $this->db->get();
		return $result->result();
	}


}
?>