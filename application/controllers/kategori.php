<?php
class kategori extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Sepatu Pria';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sepatu_pria'] = $this->model_kategori->data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarP', $data);
        $this->load->view('sepatu_pria', $data);
        $this->load->view('templates/footer');
    }
    public function sepatu_wanita()
    {
        $data['judul'] = 'Sepatu Wanita';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sepatu_wanita'] = $this->model_kategori->sepatuW()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarW', $data);
        $this->load->view('sepatu_wanita', $data);
        $this->load->view('templates/footer');
    }
    public function sepatu_anak()
    {
        $data['judul'] = 'Sepatu Anak';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sepatu_anak'] = $this->model_kategori->sepatuA()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarA', $data);
        $this->load->view('sepatu_anak', $data);
        $this->load->view('templates/footer');
    }
}
