<?php
class model_kategori extends CI_Model
{

    public function data()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'Sepatu Pria']);
    }
    public function sepatuW()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'Sepatu Wanita']);
    }
    public function sepatuA()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'Sepatu Anak-Anak']);
    }
}