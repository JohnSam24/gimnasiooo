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
	public function create($data){
        $this->db->trans_start();
        $this->db->insert('reporte',$data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return array('status' => 500,'message' => 'Internal server error.');
        } else {
            $this->db->trans_commit();
            return array('status' => 200,'message' => 'Registrado correctamente');
        }  
    }
}
?>