<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Albums extends CI_Controller {


	public

	function index() {
		$data[ 'active' ] = 'list';
		$data[ 'header' ] = 'List Album';
		$data[ 'main_content' ] = 'list_album';
		$this->load->view( 'layout\main', $data );
	}
	public

	function AddAlbum() {
		$data[ 'active' ] = 'Add';
		$data[ 'header' ] = 'Add Album';
		$data[ 'main_content' ] = 'add_album';
		$this->load->view( 'layout\main', $data );
	}

	public

	function postAlbum() {
		$config[ 'upload_path' ] = './assets/album/';
		$config[ 'allowed_types' ] = 'jpg|png';
		$config[ 'max_size' ] = 100;
		$config[ 'max_width' ] = 1024;
		$config[ 'max_height' ] = 1024;
		$new_name = time() . $_FILES[ "cover" ][ 'name' ];
		$config[ 'file_name' ] = $new_name;

		$this->load->library( 'upload', $config );

		if ( !$this->upload->do_upload( 'cover' ) ) {
			$data[ 'feedback' ] =  $this->upload->display_errors();
			$data['success']=false;
			//$error = array( 'error' => $this->upload->display_errors() );
			$this->load->view( 'jsons_rest\feedback', $data );

		} else {
			$data_upload= $this->upload->data();
			$image=$data_upload['orig_name'];
			$date=$this->input->post('released');
			$artist=$this->input->post('artist');
			$name=$this->input->post('name');
			
			$album=array(
			'album_name'=>$name,
			'album_artist'=>$artist,
			'album_cover'=>$image,
			'released_year'=>$date
			);
			
			$this->albums_model->insert( 'vectra_album', $album );
			$data['feedback']="Album is added successfully";
			$data['success']=true;
	
			$this->load->view( 'jsons_rest\feedback', $data );
		}
	}

}
?>