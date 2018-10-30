<?php
class albums_model extends CI_Model {
	
	function insert( $table, $data ) {
		$this->db->insert( $table, $data );
	}
	
		function get_album() {
		$this->db->select( '*' );
		$this->db->from( 'vectra_album' );
		$this->db->where( 'isActive=true' );
		$query = $this->db->get();
		return $query->result();
	}
	
		function get_single($id) {
		$this->db->select( '*' );
		$this->db->from( 'vectra_album' );
		$this->db->where( "id='$id'" );
		$query = $this->db->get();
		return $query->result();
	}
		function get_review($id) {
		$this->db->select( '*' );
		$this->db->from( 'vectra_reviews' );
		$this->db->where( "album_id='$id' and isActive=true " );
		$query = $this->db->get();
		return $query->result();
	}
	
	function delete( $id){
	$this->db->set('isActive',false);	
	$this->db->where('id',$id);	
	$this->db->update('vectra_album');
		
	}
	function edit($id,$data){
		$this->db->where('id', $id);
		$this->db->update('vectra_album', $data);
		
	}

	function get_reviews($id){
		$this->db->select( 'a.album_name,a.album_cover,r.review,r.name' );
		$this->db->from( 'vectra_reviews r,vectra_album a' );
		$this->db->where( "r.album_id=a.id and r.album_id=$id" );
		$query = $this->db->get();
		return $query->result();
	}
}
?>