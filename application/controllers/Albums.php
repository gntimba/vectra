<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Albums extends CI_Controller {

//index
	public

	function index() {
		$data[ 'active' ] = 'list';
		$data[ 'header' ] = 'List Album';
		$data[ 'main_content' ] = 'list_album';
		$data['albums']=$this->albums_model->get_album();
		$this->load->view( 'layout\main', $data );
	}
	public
//function to open add album page
	function AddAlbum() {
		$data[ 'active' ] = 'Add';
		$data[ 'header' ] = 'Add Album';
		$data[ 'main_content' ] = 'add_album';
		$this->load->view( 'layout\main', $data );
	}
//function to post ad add album to the data base
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
	
	//function to delete albums
	public function delete()
	{
		$albumid=$this->input->post('albumid');
		$this->albums_model->delete( $albumid );
		$date['album']=$albumid;
		$this->load->view( 'jsons_rest\delete', $data );
	}
	//function to add review to the database
		public function post_review($id)
	{
		$name=$this->input->post('name');
		$review=$this->input->post('review');
			$insReview=array('album_id'=>$id,
							 'Review'=>$review,
							 'name'=>$name
							);
			$data['review']="Review succesfully added";
		$this->albums_model->insert( 'vectra_reviews',$insReview );
		$this->load->view( 'jsons_rest\review_json', $data );
	}
	//function to open the edit page
	public function edit($id)
	{
		$data[ 'active' ] = 'list';
		$data[ 'header' ] = 'Edit Album';
		$data[ 'main_content' ] = 'edit_view';
		$data['id']=$id;
		$data['albums']=$this->albums_model->get_single($id);
		$this->load->view( 'layout\main', $data );
	}
	//function to update the albums
	public function editJson($id)
	{
			
			$date=$this->input->post('released');
			$artist=$this->input->post('artist');
			$name=$this->input->post('name');
			
			$album=array(
			'album_name'=>$name,
			'album_artist'=>$artist,
			'released_year'=>$date
			);
			
			$this->albums_model->edit( $id, $album );
			$data['feedback']="Album is added successfully";
			$data['success']=true;
	
			$this->load->view( 'jsons_rest\feedback', $data );
	}
	//function to open reviews page
	public function viewRviews($id){
		$data[ 'active' ] = 'list';
		$data[ 'header' ] = 'reviews of the album';
		$data[ 'main_content' ] = 'reviews';
		$data['id']=$id;
		$data['reviews']=$this->albums_model->get_reviews($id);
		if(empty($data['reviews']))
		{
		
			$data[ 'main_content' ] = 'empty';
		}
			
		$this->load->view( 'layout\main', $data );
	}

}
?>