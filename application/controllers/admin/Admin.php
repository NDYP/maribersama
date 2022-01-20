<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();

        akses();
        $this->load->model('M_Admin');
        $this->load->model('M_Pengguna');
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['title'] = "Index Admin";
        $data['index'] = $this->M_Admin->index();
        $data['karyawan'] = $this->M_Pengguna->indexkaryawan();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/admin/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function tambah()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'password' => $password,
        );
        $this->M_Admin->tambah('admin', $data);
        $this->session->set_flashdata('success', 'Berhasil tambah data');
        redirect('admin/admin/index', 'refresh');
    }
    public function edit()
    {
        $data['profil'] = $this->M_Profil->index();

        $id_pengguna = $this->uri->segment(4, 0);
        $data['index'] = $this->M_Admin->index();
        $data['index2'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
        $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
        if ($data) {
            $data['title'] = "Edit data admin";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/admin/detail', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    public function hapus()
    {
        $id_admin = $this->uri->segment(4, 0);
        $data = $this->M_Admin->get($id_admin);
        if ($data) {
            $this->M_Admin->hapus($id_admin);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('admin/admin/index', 'refresh');
        }
    }
    public function hapusberkas($id_berkas)
    {
        $data =
            $this->db->get_where('berkas', array('id_berkas' => $id_berkas))->row_array();
        if ($data) {
            $this->M_Admin->hapusberkas($id_berkas);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    function tambahberkas()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Judul Berkas Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['berkas']['name'])) {
            $this->form_validation->set_rules('berkas', 'berkas', 'required', [
                'required' => 'File Tidak Boleh Kosong!'
            ]);
        }
        if ($this->form_validation->run() == FALSE) {
            $id_pengguna = $this->uri->segment(4);
            $data['index'] = $this->M_Admin->index();
            $data['index2'] = $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
            $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_pengguna))->result_array();
            if ($data) {
                $data['title'] = "Edit data admin";
                $this->session->set_flashdata('info', 'Form Upload Tidak Boleh Kosong');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('info', 'Tidak Ada Data');
                redirect('admin/album/index', 'refresh');
            }
        } else {
            $config['upload_path'] = './assets/berkas/pengguna/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $this->input->post('nik');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('berkas')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/berkas/pengguna/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/berkas/pengguna/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $id_pemilik = $this->input->post('id_pemilik');
                $judul = $this->input->post('judul');
                $tanggal = date('Y-m-d');
                $data = array(
                    'berkas' => $file,
                    'judul' => $judul,
                    'daftar' => $tanggal,
                    'id_pemilik' => $id_pemilik,
                );
                $this->M_Admin->tambah('berkas', $data);
                $this->session->set_flashdata('success', 'Berhasil Upload Berkas');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('info', 'Gagal Upload Berkas');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
    function ubah()
    {

        $id_admin = $this->input->post('id_admin');
        $id_pengguna = $this->input->post('id_pengguna');
        $data = array(
            'id_pengguna' => $id_pengguna,
        );
        $this->M_Admin->update('admin', $data, array('id_admin' => $id_admin));
        $this->session->set_flashdata('success', 'Berhasil ubah data');
        redirect('admin/admin/index', 'refresh');
    }
}