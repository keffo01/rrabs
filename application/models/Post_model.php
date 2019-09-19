<?php
class Post_model extends CI_Model{

	public function extraerPost($id){
		$this->db->select('a.Id_post, b.Nombre as Producto, b.Descripcion, b.Precio, b.Regate, c.Tipo_categoria,d.Nombre, d.Apellido, d.Nombre_usuario, d.Email, d.foto, a.Fecha_publicacion, b.Imagen1');
		$this->db->from('post a');
		$this->db->join('productos b','b.Id_producto = a.Producto_id');
		$this->db->join('categorias c','c.Id_categoria = b.Categoria_id');
		$this->db->join('usuarios d','d.Id_usuario = b.Usuario_id');
		$this->db->where('Id_post='.$id);
		$post = $this->db->get();
		return $post->row();
	}
	public function Buscar($search){
		$pa="CALL sp_buscador('$search')";
		$resultado=$this->db->query($pa);
		return $resultado->result();
	}

		public function Categoria($Categoria){
		$pa="CALL sp_categoria_post('$Categoria')";
		$resultado=$this->db->query($pa);
		return $resultado->result();
	}
}
?>