<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        

	 }



	public function index()
	{
		$this->load->view('view_admin');
	}


	public function mostrar_prod(){
        $this->load->view('view_productos');

	}

	public function mostrar_login(){
        $this->load->view('view_login');

	}
    	
}
?>