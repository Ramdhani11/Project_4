<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Home | Beranda';
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarD', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = [

            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        ];

        $this->cart->insert($data);
        redirect('dashboard');
    }

    public function detail_keranjang()
    {
        $data['judul'] = 'Isi keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Dashboard');
    }
    public function pembayaran()
    {
        $data['judul'] = 'Pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $data['judul'] = 'Proses';
            $this->cart->destroy();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf,Pesanan Anda Gagal diproses";
        }
    }
    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $data['judul'] = 'Detail';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
}