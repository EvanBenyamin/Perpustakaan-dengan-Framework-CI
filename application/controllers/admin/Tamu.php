<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tamu extends MY_Controller {
	
	public function __construct()
		{
			parent::__construct();
			
		}
	public function index(){
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts!='')
		{
			/*layout*/	
			$data['title']='Daftar Tamu';
			$data['pointer']="Tamu";
			$data['classicon']="fa fa-users";
			$data['main_bread']="Data Tamu";
			$data['sub_bread']="Daftar Tamu";
			$data['desc']="Data Master Tamu, Menampilkan data Tamu";
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			/*data yang ditampilkan*/
			$data['data_tamu'] = $this->Buku_model->getAllData("tb_tamu");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('admin/denda/js');
			$tmp['content']=$this->load->view('admin/tamu/View_tamu',$data, TRUE);
			$this->load->view('admin/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}
	
 	
}