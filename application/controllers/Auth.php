<?php
class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format harus email'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Mohon isi Password!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $tb_user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($tb_user) {
            if ($tb_user['is_active'] == 1) {
                if (password_verify($password, $tb_user['password'])) {
                    $data = [
                        'email' => $tb_user['email'],
                        'role_id' => $tb_user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($tb_user['role_id'] == 1) {
                        redirect('admin/Dashboard_admin');
                    } else {
                        redirect('Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password salah!!
          </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Anda tidak bisa login,Karena email belum aktif.
          </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar,Mohon daftar dulu.
          </div>');
            redirect('Auth');
        }
    }
    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Mohon isi nama terlebih dahulu'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'required' => 'Mohon isi email terlebih dahulu',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password masih kosong',
            'min_length' => 'Password terlalu pendek',


        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password masih kosong',
            'matches' => 'Password tidak sama'

        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/daftar');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun anda telah berhasil dibuat,Silahkan Login
          </div>');
            redirect('Auth/');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Anda telah logout!
          </div>');
        redirect('Auth/');
    }
}
