<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Producto_model extends CI_Model {


	public function registrarProduct($products){
		$save =	$this->db->insert('productos', $products);
		if($save){
			return 'Exito al registrar';

		}else{
			return 'Fallo al registrar';
		}
	}

	public function Categoria(){
		$select = $this->db->get('categorias');
		return $select->result_array();
	}
	public function listaProduct(){
		$this->db->select('a.*,b.*');
		$this->db->from('productos a');
		$this->db->join('categorias b', 'a.Categoria_id = b.Id_Categoria');
		$pro = $this->db->get();
		return $pro->result_array();

	}
	public function extracProduct($id){
		$this->db->where('Id_producto',$id);
		$pro = $this->db->get('productos');
		return $pro->result_array();
	}
	public function actualizarProduct(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$des = $this->input->post('des');
		$precio = $this->input->post('precio');
		$regate = $this->input->post('regate');
		$cate = $this->input->post('select');

		$this->db->set('Nombre',$name);
		$this->db->set('Descripcion',$des);
		$this->db->set('Precio',$precio);
		$this->db->set('Regate',$regate);
		$this->db->set('Categoria_id',$cate);

		$this->db->where('Id_producto',$id);

		$result=$this->db->update('productos');
		if($result){
			return 'Exito';
		}else{
			return 'Error';
		}

	}
	public function eliminarProduct($id){
		$this->db->where('Id_producto', $id);
		$result=$this->db->delete('productos');
		if($result)
		{
			return 'exito';
		}
		else
		{
			return 'fail';
		}
	}
	public function Mostrar_post(){
		$pa="Call sp_post()";
		$resultado=$this->db->query($pa);
		$algo= $resultado->result();
		$resultado->next_result(); // Dump the extra resultset.
   $resultado->free_result(); // Does what it says.
		return $algo;
	}
		

}
?>