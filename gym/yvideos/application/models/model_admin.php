<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_admin extends CI_Model {

     function __construct()
     {
        parent::__construct();


	 }



	public function index()
	{
		//$this->load->view('welcome_message');
	}

    public function cuenta_usuario(){
		$sql="SELECT COUNT(*) contar
		FROM usuarios
		WHERE USER='robin'
		AND pass= '1235';";

		$query= $this->db->query($sql);
		
		//return $query->result();
		return $query->row();

	}
}
?>