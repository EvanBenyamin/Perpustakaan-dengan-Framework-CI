<?php
/*
    Copyright INTI PHP
    info.intiphp@gmail.com
    https://www.intiphp.com
*/
class Model_Report extends CI_Model{

	 function __construct()
    {
        parent::__construct();
    }


    public function list_pinjam_join($where){
        
        $this->db->select('*');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_anggota','tb_anggota.id_anggota=tb_pinjam.id_anggota','left');
        $this->db->where($where);
        $this->db->order_by('tb_pinjam.tgl_pinjam','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    public function list_buku_join($where){
        
        $this->db->select('*');
        $this->db->from('tb_detail_pinjam');
        $this->db->join('tb_buku','tb_buku.id_buku=tb_detail_pinjam.id_buku','left');
        $this->db->where($where);    
        $query = $this->db->get(); 
        return $query;
    }

     public function list_kembali_join($where){
        
        $this->db->select('*');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_anggota','tb_anggota.id_anggota=tb_pinjam.id_anggota','left');
        $this->db->join('tb_kembali','tb_kembali.id_pinjam=tb_pinjam.id_pinjam','left');
        $this->db->where($where);
        $this->db->order_by('tb_pinjam.tgl_pinjam','Desc');      
        $query = $this->db->get(); 
        return $query;
    }

   public function list_buku_join2(){
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_kategori','tb_buku.id_kategori=tb_kategori.id_kategori','left');      
        $query = $this->db->get(); 
        return $query;
    }

    public function list_data($table){
        $this->db->select('*');
        $this->db->from($table);   
        $query = $this->db->get(); 
        return $query;
    }

     public function list_pinjam_lap($where){
        
        $this->db->select('*');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_anggota','tb_anggota.id_anggota=tb_pinjam.id_anggota','left');
        $this->db->join('tb_detail_pinjam','tb_pinjam.id_pinjam=tb_detail_pinjam.id_pinjam','left');
        $this->db->join('tb_buku','tb_detail_pinjam.id_buku=tb_buku.id_buku','left');
        $this->db->where($where);
        $this->db->order_by('tb_pinjam.tgl_pinjam','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
     public function list_kembali_lap($where){
        
        $this->db->select('*');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_anggota','tb_anggota.id_anggota=tb_pinjam.id_anggota','left');
        $this->db->join('tb_detail_pinjam','tb_pinjam.id_pinjam=tb_detail_pinjam.id_pinjam','left');
        $this->db->join('tb_buku','tb_detail_pinjam.id_buku=tb_buku.id_buku','left');
        $this->db->join('tb_kembali','tb_kembali.id_pinjam=tb_pinjam.id_pinjam','left');
        $this->db->where($where);
        $this->db->order_by('tb_kembali.tgl_dikembalikan','Desc');      
        $query = $this->db->get(); 
        return $query;
    }
    
    
}