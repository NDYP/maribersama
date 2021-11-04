<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Partner');
        $this->load->model('M_Profil');
        $this->load->model('M_Mobil');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Layanan');
    }
    function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Nama Pengguna Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kata Sandi Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $data['kontak'] = $this->M_Profil->index();
            $this->load->view('pengunjung/template/header', $data);
            $this->load->view('pengunjung/login/login', $data);
            $this->load->view('pengunjung/template/footer', $data);
        } else {
            $this->auth();
        }
    }
    function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_admin = $this->M_Admin->login_pengunjung($username);
        if ($data = $cek_admin->row_array()) {
            if (($password == $data['password'])) {
                $all = [
                    //'id_admin' => $data['id_pengguna'],
                    'id_pengguna' => $data['id_pengguna'],
                    'nama_lengkap' => $data['nama_lengkap'],
                    'nik' => $data['nik'],
                    'email' => $data['email'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'no_hp' => $data['no_hp'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'daftar' => $data['daftar'],
                    'alamat' => $data['alamat'],
                    'foto' => $data['foto'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                ];
                $this->session->set_userdata($all);
                redirect('katalog/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Password Salah');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('success', 'Akun Tidak Terdaftar');
            redirect('login/index');
        }
    }
    function registrasi()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim', [
            'required' => 'Nama Lengkap Beserta Title Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[pengguna.nik]', [
            'required' => 'NIK Tidak Boleh Kosong!',
            'is_unique' => 'NIK Telah Terdaftar'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Domisili Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim', [
            'required' => 'Nomor Telepon/HP/WA Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tentang Kami";
            $data['index'] = $this->M_Profil->index();
            $data['karyawan'] = $this->M_Pengguna->indexkaryawan();
            $data['layanan'] = $this->M_Layanan->index();
            $this->load->view('pengunjung/template/header', $data);
            $this->load->view('pengunjung/tentang/index', $data);
            $this->load->view('pengunjung/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/pengguna/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $nik = $this->input->post('nik');
                    $nama_lengkap = $this->input->post('nama_lengkap');
                    $email = $this->input->post('email');
                    $alamat = $this->input->post('alamat');
                    $no_hp = $this->input->post('no_hp');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tanggal = date('Y-m-d');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $x = $this->input->post('tanggal_lahir');
                    $tanggal_lahir = date('Y-m-d', strtotime($x));
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $data = array(
                        'foto' => $file,
                        'username' => $username,
                        'password' => $password,
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'alamat' => $alamat,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'daftar' => $tanggal,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jenis_kelamin' => $jenis_kelamin,
                        'id_akses' => 3,
                    );
                    $this->M_Customer->tambah('pengguna', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('customer/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('customer/index', 'refresh');
                }
            } else {
                $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $no_hp = $this->input->post('no_hp');
                $jabatan = $this->input->post('jabatan');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $tanggal = date('Y-m-d');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $x = $this->input->post('tanggal_lahir');
                $tanggal_lahir = date('Y-m-d', strtotime($x));
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'email' => $email,
                    'jabatan' => $jabatan,
                    'daftar' => $tanggal,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'id_akses' => 2,
                );
                $this->M_Customer->tambah('pengguna', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('customer/index', 'refresh');
            }
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index', 'refresh');
    }
}