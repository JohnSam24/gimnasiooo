<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        $this->load->model('model_admin');

	 }



	public function index()
	{
		$this->load->view('view_admin');
	}


	public function mostrar_usuario(){
        $this->load->view('view_usuarios');

	}


	
	public function mostrar_login(){
        $this->load->view('view_login');

	}
	
	public function valida_user(){
		$usuario= $this ->input ->post ('user');
		$contrasena= $this ->input ->post ('pass');
        
        $result=$this->model_admin->cuenta_usuario($usuario,$contrasena);
	}
}
?>