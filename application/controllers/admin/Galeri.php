<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Galeri');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['title'] = 'Kelola Album';
        $data['album'] = $this->M_Galeri->index();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/galeri/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function detail($id_album)
    {
        $data['title'] = 'Detail Album';
        $data['album'] = $this->M_Galeri->get($id_album);
        $data['galeri'] = $this->db->get_where('galeri', array('id_album' => $id_album))->result_array();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/galeri/edit', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function ubah()
    {
        $config['upload_path'] = './assets/foto/album/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('nama_album'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['thumbnail']['name'])) {
            if ($this->upload->do_upload('thumbnail')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/album/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/album/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $nama_album = $this->input->post('nama_album');
                $id_album = $this->input->post('id_album');
                $data = array(
                    'thumbnail' => $file,
                    'nama_album' => $nama_album,
                    'status' => 'Aktif',
                );
                $this->M_Galeri->update('galeri', $data, array('id_album' => $id_album));
                $this->session->set_flashdata('success', 'Berhasil Ubah Data');
                redirect('admin/galeri/index', 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Gagal Tambah Data');
                redirect('admin/galeri/index', 'refresh');
            }
        } else {
            $nama_album = $this->input->post('nama_album');
            $id_album = $this->input->post('id_album');
            $data = array(
                'nama_album' => $nama_album,
                'status' => 'Aktif',
            );
            $this->M_Galeri->update('album', $data, array('id_album' => $id_album));
            $this->session->set_flashdata('success', 'Berhasil Ubah Data');
            redirect('admin/galeri/index', 'refresh');
        }
    }
    function aktif($id_album)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->M_Galeri->update('galeri', $data, array('id_album' => $id_album));
        $this->session->set_flashdata('success', 'Galeri Aktif');
        redirect('admin/galeri/index', 'refresh');
    }
    function nonaktif($id_album)
    {
        $data = array(
            'status' => 'Nonaktif',
        );
        $this->M_Galeri->update('galeri', $data, array('id_album' => $id_album));
        $this->session->set_flashdata('success', 'Galeri Nonaktif');
        redirect('admin/galeri/index', 'refresh');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama_album', 'nama_album', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Album Baru';
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/galeri/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/album/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nama_album'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['thumbnail']['name'])) {
                if ($this->upload->do_upload('thumbnail')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/album/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/album/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('Y-m-d');
                    $nama_album = $this->input->post('nama_album');

                    $data = array(
                        'thumbnail' => $file,
                        'nama_album' => $nama_album,
                        'tanggal' => $date,
                        'status' => 'Aktif',
                    );
                    $this->M_Galeri->tambah('album', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/galeri/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/galeri/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Pilih Gambar');
                redirect('admin/galeri/tambah', 'refresh');
            }
        }
    }
    public function hapus($id_album)
    {
        $data =
            $this->db->get_where('album', array('id_album' => $id_album))->row_array();
        if ($data) {
            $this->M_Galeri->hapus($id_album);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/galeri/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/galeri/index', 'refresh');
        }
    }
    public function hapusgaleri($id_galeri)
    {
        $data =
            $this->db->get_where('galeri', array('id_galeri' => $id_galeri))->row_array();
        if ($data) {
            $this->M_Galeri->hapusgaleri($id_galeri);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function tambahgaleri()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_album', 'id_album', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Galeri Baru';
            $data['album'] = $this->M_Galeri->index();
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/galeri/tambahgaleri', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/album/galeri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('judul'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/album/galeri/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $config['new_image'] = './assets/foto/album/galeri/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    date_default_timezone_set("ASIA/JAKARTA");
                    $date = date('Y-m-d');
                    $judul = $this->input->post('judul');
                    $id_album = $this->input->post('id_album');
                    $data = array(
                        'foto' => $file,
                        'judul' => $judul,
                        'id_album' => $id_album,
                        'daftar' => $date,
                    );
                    $this->M_Galeri->tambah('galeri', $data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect('admin/galeri/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/galeri/index', 'refresh');
                }
            } else {
                $this->session->set_flashdata('warning', 'Pilih Gambar');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}