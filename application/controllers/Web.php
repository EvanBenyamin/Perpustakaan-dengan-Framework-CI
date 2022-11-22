<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {


	public function _construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('Perpus_model');
	}
	public function index(){
			$data['title']='Daftar buku';
			/*data yang ditampilkan*/
			$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			$data['model'] = $this->Buku_model;
			/*masukan data kedalam view */
			//$data['js']=$this->load->view('admin/buku/js');
			$tmp['content']=$this->load->view('global/R_buku',$data, TRUE);
			$this->load->view('global/layout',$tmp);
		
	}

	//halaman login
	public function log()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{

			$tmp['content']=$this->load->view('global/login');
	
		}
		else
		{
			$st = $this->session->userdata('stts');
			echo $s = $this->session->userdata('username');
				
			header('location:'.base_url().'admin/Home');
	
		}
	}
	
	//mengambil data login
	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->Perpus_model->getLoginData($u,$p);
	}
	
	//logout
	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			
			header('location:'.base_url().'web/log');
		}
		else
		{
			
			$this->session->sess_destroy();
			header('location:'.base_url().'web/log');
			
		}
	}

}

/* End of file web.php */
/* Location: ./application/controllers/web.php */