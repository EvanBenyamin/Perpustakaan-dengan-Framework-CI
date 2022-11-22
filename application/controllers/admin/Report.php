<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->model('Model_Report');
        }
    public function index($id)
    {
         $where=array('tb_pinjam.id_pinjam ='=>$id);
         $where2=array('id_pinjam ='=>$id);
         $data=array(
            "data"=>$this->Model_Report->list_pinjam_join($where)->result(),
            "buku"=>$this->Model_Report->list_buku_join($where2)->result(),
            );
      
        $this->load->view("admin/cetak/cetak-peminjaman",$data);
    }

    public function kembali($id)
    {
         $where=array('tb_pinjam.id_pinjam ='=>$id);
         $where2=array('id_pinjam ='=>$id);
         $data=array(
            "data"=>$this->Model_Report->list_kembali_join($where)->result(),
            "buku"=>$this->Model_Report->list_buku_join($where2)->result(),
            );
      
        $this->load->view("admin/cetak/cetak-pengembalian",$data);
    }

    public function buku()
    {
         $data=array(
            "data"=>$this->Model_Report->list_buku_join2()->result(),
            );
      
        $this->load->view("admin/cetak/cetak-buku",$data);
    }
    public function anggota()
    {
         $data=array(
            "data"=>$this->Model_Report->list_data('tb_anggota')->result(),
            );
      
        $this->load->view("admin/cetak/cetak-anggota",$data);
    }

    public function peminjaman_hari(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tanggal';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Peminjaman, Menampilkan data Peminjaman";
            $tmp['content']=$this->load->view('admin/cetak/filter_pinjaman_hari',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_peminjaman_hari(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tgl_filter', 'tgl_filter', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $tgl=date('Y-m-d', strtotime($this->input->post('tgl_filter')));
                    $where=array('tb_pinjam.tgl_pinjam'=>$tgl);
                    $data=array(
                        'data'=>$this->Model_Report->list_pinjam_lap($where)->result(),
                        'filter'=>'Laporan Peminjaman Buku Perhari',
                        'data_filter'=>'Tanggal : '.date('d F Y',strtotime($this->input->post('tgl_filter'))),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-peminjaman",$data);
                }else{
                  $this->peminjaman_hari();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
       public function peminjaman_bulan(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Bulan';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Peminjaman, Menampilkan data Peminjaman";
            $tmp['content']=$this->load->view('admin/cetak/filter_pinjaman_bulan',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_peminjaman_bulan(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('bulan', 'bulan', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $bln=$this->input->post('bulan');
                    $where=array('month(tgl_pinjam)'=>$bln);
                    $data=array(
                        'data'=>$this->Model_Report->list_pinjam_lap($where)->result(),
                        'filter'=>'Laporan Peminjaman Buku PerBulan',
                        'data_filter'=>'Bulan : '.bulan($this->input->post('bulan')),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-peminjaman",$data);
                }else{
                  $this->peminjaman_bulan();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
     public function peminjaman_tahun(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tahun';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master peminjaman, Menampilkan data Peminjaman";
            $tmp['content']=$this->load->view('admin/cetak/filter_pinjaman_tahun',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_peminjaman_tahun(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tahun', 'tahun', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $thn=$this->input->post('tahun');
                    $where=array('year(tgl_pinjam)'=>$thn);
                    $data=array(
                        'data'=>$this->Model_Report->list_pinjam_lap($where)->result(),
                        'filter'=>'Laporan Peminjaman Buku PerTahun',
                        'data_filter'=>'Tahun : '.$this->input->post('tahun'),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-peminjaman",$data);
                }else{
                  $this->peminjaman_tahun();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }

    // Pengembalian ///////////////////////////////////////////////////////////////////////////


     public function dikembalikan_hari(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tanggal';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Pengembalian, Menampilkan data Pengembalian";
            $tmp['content']=$this->load->view('admin/cetak/filter_dikembalikan_hari',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_dikembalikan_hari(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tgl_filter', 'tgl_filter', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $tgl=date('Y-m-d', strtotime($this->input->post('tgl_filter')));
                    $where=array('tb_kembali.tgl_dikembalikan'=>$tgl);
                    $data=array(
                        'data'=>$this->Model_Report->list_kembali_lap($where)->result(),
                        'filter'=>'Laporan Pengembalian Buku Perhari',
                        'data_filter'=>'Tanggal : '.date('d F Y',strtotime($this->input->post('tgl_filter'))),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-pengembalian",$data);
                }else{
                  $this->dikembalikan_hari();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }

    public function dikembalikan_bulan(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Bulan';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Dikembalikan, Menampilkan data Dikembalikan";
            $tmp['content']=$this->load->view('admin/cetak/filter_dikembalikan_bulan',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_dikembalikan_bulan(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('bulan', 'bulan', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $bln=$this->input->post('bulan');
                    $where=array('month(tgl_dikembalikan)'=>$bln);
                    $data=array(
                        'data'=>$this->Model_Report->list_kembali_lap($where)->result(),
                        'filter'=>'Laporan Pengembalian Buku PerBulan',
                        'data_filter'=>'Bulan : '.bulan($this->input->post('bulan')),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-pengembalian",$data);
                }else{
                  $this->dikembalikan_bulan();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
     public function dikembalikan_tahun(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tahun';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Pengembalian, Menampilkan data Pengembalian";
            $tmp['content']=$this->load->view('admin/cetak/filter_dikembalikan_tahun',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_dikembalikan_tahun(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tahun', 'tahun', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $thn=$this->input->post('tahun');
                    $where=array('year(tgl_dikembalikan)'=>$thn);
                    $data=array(
                        'data'=>$this->Model_Report->list_kembali_lap($where)->result(),
                        'filter'=>'Laporan Pengembalian Buku PerTahun',
                        'data_filter'=>'Tahun : '.$this->input->post('tahun'),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-pengembalian",$data);
                }else{
                  $this->dikembalikan_tahun();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }


     public function peminjaman_range(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tanggal';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Peminjaman, Menampilkan data Peminjaman";
            $tmp['content']=$this->load->view('admin/cetak/filter_pinjaman_range',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_peminjaman_range(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tgl1', 'tgl1', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $tgl1=date('Y-m-d', strtotime($this->input->post('tgl1')));
                    $tgl2=date('Y-m-d', strtotime($this->input->post('tgl2')));
                    $where='tb_pinjam.tgl_pinjam BETWEEN "'.$tgl1. '" and "'.$tgl2.'"';
                    $data=array(
                        'data'=>$this->Model_Report->list_pinjam_lap($where)->result(),
                        'filter'=>'Laporan Peminjaman Buku Range',
                        'data_filter'=>'Tanggal : '.date('d F Y',strtotime($tgl1)).' - '.date('d F Y',strtotime($tgl2)),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-peminjaman",$data);
                }else{
                  $this->peminjaman_range();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }

      public function dikembalikan_range(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
            $data['title']='Filter Tanggal';
            $data['pointer']="Filter";
            $data['classicon']="fa fa-print";
            $data['main_bread']="Cetak";
            $data['sub_bread']="Cetak";
            $data['desc']="Data Master Pengembalian, Menampilkan data Pengembalian";
            $tmp['content']=$this->load->view('admin/cetak/filter_dikembalikan_range',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
            }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
    public function cetak_dikembalikan_range(){
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts!='')
        {
                $this->form_validation->set_rules('tgl1', 'tgl1', 'required');
                if($this->form_validation->run()==TRUE)
                {
                    $tgl1=date('Y-m-d', strtotime($this->input->post('tgl1')));
                    $tgl2=date('Y-m-d', strtotime($this->input->post('tgl2')));
                    $where='tb_kembali.tgl_dikembalikan BETWEEN "'.$tgl1. '" and "'.$tgl2.'"';
                    $data=array(
                        'data'=>$this->Model_Report->list_kembali_lap($where)->result(),
                        'filter'=>'Laporan Pengembalian Buku Range',
                        'data_filter'=>'Tanggal : '.date('d F Y',strtotime($tgl1)).' - '.date('d F Y',strtotime($tgl2)),
                    );
                 

                    $this->load->view("admin/cetak/cetak-lap-pengembalian",$data);
                }else{
                  $this->dikembalikan_range();  
                }
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
       
    }
 
}
?>