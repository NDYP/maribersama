<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita');
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
        login();
        akses();
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['title'] = 'Kelola Berita';
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();

        $data['berita'] = $this->M_Berita->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/berita/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function ubah()
    {
        $config['upload_path'] = './assets/foto/berita/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('judul'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/berita/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/berita/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $judul = $this->input->post('judul');
                $id_berita = $this->input->post('id_berita');
                $isi = $this->input->post('isi');

                $data = array(
                    'gambar' => $file,
                    'judul' => $judul,
                    'isi' => $isi,
                    'status' => 'Aktif',
                    'id_author' => $this->session->userdata('nama_lengkap'),
                );
                $this->M_Berita->update('berita', $data, array('id_berita' => $id_berita));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/berita/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/berita/index', 'refresh');
            }
        } else {
            $judul = $this->input->post('judul');
            $id_berita = $this->input->post('id_berita');
            $isi = $this->input->post('isi');
            $id_author = $this->session->userdata('id_author');
            $data = array(
                'judul' => $judul,
                'isi' => $isi,
                'status' => 'Aktif',
                'id_author' => $this->session->userdata('nama_lengkap'),
            );
            $this->M_Berita->update('berita', $data, array('id_berita' => $id_berita));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/berita/index', 'refresh');
        }
    }
    function edit($id_berita)
    {
        $data['profil'] = $this->M_Profil->index();

        $data['title'] = 'Detail Berita';
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();

        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();

        $data['berita'] = $this->M_Berita->get($id_berita);
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/berita/edit', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function aktif($id_berita)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_Berita->update('berita', $data, array('id_berita' => $id_berita));
        $this->session->set_flashdata('success', 'Berita Aktif');
        redirect('admin/berita/index', 'refresh');
    }
    function nonaktif($id_berita)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_Berita->update('berita', $data, array('id_berita' => $id_berita));
        $this->session->set_flashdata('success', 'Berita Nonaktif');
        redirect('admin/berita/index', 'refresh');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('isi', 'isi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Berita Baru';
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $data['profil'] = $this->M_Profil->index();

            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/berita/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/berita/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('judul'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/berita/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/berita/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('Y-m-d');
                    $judul = $this->input->post('judul');
                    $isi = $this->input->post('isi');
                    $data = array(
                        'foto' => $file,
                        'judul' => $judul,
                        'isi' => $isi,
                        'tanggal' => $date,
                        'status' => 'Aktif',
                        'id_author' => $this->session->userdata('nama_lengkap'),
                    );
                    $this->M_Berita->tambah('berita', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/berita/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/berita/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Pilih Gambar');
                redirect('admin/berita/tambah', 'refresh');
            }
        }
    }

    public function hapus($id_berita)
    {
        $data =
            $this->db->get_where('berita', array('id_berita' => $id_berita))->row_array();
        if ($data) {
            $this->M_Berita->hapus($id_berita);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/berita/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/berita/index', 'refresh');
        }
    }
}