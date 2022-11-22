<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {


	public function __construct(){
		parent::__construct();

		//$this->load->model('Buku_model');
	}

	public function index(){
		$this->list_buku();
	}

	public function profile(){

		$data['title']='Profile Sekolah';
		$tmp['content']=$this->load->view('global/profile', $data,TRUE);
		$this->load->view('global/layout',$tmp);
		
	}


	public function kontak(){

		$data['title']='Kontak Sekolah';
		$tmp['content']=$this->load->view('global/kontak', $data,TRUE);
		$this->load->view('global/layout',$tmp);
		
	}

	//menampilkan daftar buku
	public function list_buku(){
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

	public function buku_tamu(){
				$data['title']='Daftar Tamu';
			/*data yang ditampilkan*/

			$data['data_tamu'] = $this->Buku_model->list_data("tb_tamu");
			$data['model'] = $this->Buku_model;
			/*masukan data kedalam view */
			//$data['js']=$this->load->view('admin/buku/js');
			$tmp['content']=$this->load->view('global/buku_tamu',$data, TRUE);
			$this->load->view('global/layout',$tmp);
	}
	public function simpan_buku_tamu()
	{
	
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->buku_tamu();
		}
	 	else
		{
			date_default_timezone_set("Asia/Jakarta");
	        $data = array('id_tamu' =>'',
	                      'nis' => $this->input->post('id'),
	                      'nama' => $this->input->post('nama'),
	                      'tgl'=>date('Y-m-d H:i:s')
	                    );
			$query=$this->Buku_model->insertData('tb_tamu',$data);

			redirect("Buku/buku_tamu");	
		}
		
	}

	//menampilkan daftar detail stock buku
	public function detail_stok(){

		$id_buku = $this->input->get('id_buku', TRUE);	
			/*layout*/	
			$data['title']='Daftar Detail Stock Buku';
			$data['pointer']="buku/buku/";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Buku";
			$data['sub_bread']="Detail Stock Buku";
			$data['desc']="Data Detail Stock, Menampilkan Detail Stock Buku Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_stok_buku'] = $this->Buku_model->get_detail("tb_detail_buku",'id_buku', $id_buku);
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			$data['id']= $id_buku;
			$data['error']="";
			
			/*masukan data kedalam view */
			$tmp['content']=$this->load->view('global/R_detail_stok',$data, TRUE);
			$this->load->view('global/layout',$tmp);	//}
	}
}
