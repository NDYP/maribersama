<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Partner');
        $this->load->model('M_Kontak');
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
            $this->load->view('admin/login/login', $data);
        } else {
            $this->auth();
        }
    }
    function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_admin = $this->M_Admin->cek_login($username);
        $cek_partner = $this->M_Admin->login_pengunjung($username);
        if ($data = $cek_admin->row_array()) {
            if (($password == $data['password_admin'] || $password == $data['password'])) {
                $all = [
                    'id_pengguna' => $data['id_pengguna'],
                    'nama_lengkap' => $data['nama_lengkap'],
                    'nik' => $data['nik'],
                    'email' => $data['email'],
                    'username_admin' => $data['username_admin'],
                    'password_admin' => $data['password_admin'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'no_hp' => $data['no_hp'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'daftar' => $data['daftar'],
                    'alamat' => $data['alamat'],
                    'foto' => $data['foto'],
                    'salary' => $data['salary'],
                    'jabatan' => $data['jabatan'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                    'id_akses' => $data['id_akses'],
                ];
                $this->session->set_userdata($all);
                if ($this->session->userdata('id_akses') == 4) {
                    redirect('admin/history/index', 'refresh');
                } else {
                    redirect('admin/dashboard/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('success', 'Password Salah');
                redirect('admin/login/index');
            }
        } elseif ($data = $cek_partner->row_array()) {
            if (($password == $data['password'])) {
                $all = [
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
                    'salary' => $data['salary'],
                    'jabatan' => $data['jabatan'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                    'id_akses' => $data['id_akses'],
                ];
                $this->session->set_userdata($all);
                if ($this->session->userdata('id_akses') == 4) {
                    redirect('admin/history/index', 'refresh');
                } else {
                    redirect('admin/dashboard/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('success', 'Password Salah');
                redirect('admin/login/index');
            }
        } else {
            $this->session->set_flashdata('success', 'Akun Tidak Terdaftar');
            redirect('admin/login/index');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login/index', 'refresh');
    }
}