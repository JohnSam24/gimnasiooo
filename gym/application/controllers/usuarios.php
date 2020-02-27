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
	public function generate($id,$type){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method != 'POST'){
            json_output(400,array('status' => 400,'message' => 'Bad request.'));
        } else {
            $config['upload_path'] = 'FondoWed/Imagen/godsin.jpg';
            $config['allowed_type'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2024';
            $config['max_height'] = '2008';

            $this->load->library('Imagen',$config);
            if($this->Imagen->do_upload('fileImagen')){
                json_output($response['status'],$this->Imagen->display_errors());
            } else {
                $file_info = $this->Imagen->data();
                $descrption = $this->input->post('description');
                $location = $this->input->post('location');
                $date = date("Y-m-d");
                $time = date("H:i:s", strtotime('+12 hours'));
                //$file = $file_info['file_name'];
                $text = $this->input->post('titImagen');

               $data = array(
                  'usuario' => $id,
                  'tipo' => $type,
                  'fecha' => $date,
                  'hora' => $time,
                  'obsUsuario' => $descrption,
                  'localizacion' => $location,
                  'foto' => $text

                );

                $this->load->model('Reportmodel');
                $response = $this->Reportmodel->create($data);
            }
        }
    
	}
		
}
?>