<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Layanan');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Index layanan rental";
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['index'] = $this->M_Layanan->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/layanan/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama_layanan', 'nama_layanan', 'required|trim', [
            'required' => 'Layanan Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required|trim', [
            'required' => 'Icon Layanan Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah layanan rental";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $data['layanan'] = $this->M_Layanan->index();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/layanan/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/layanan/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
            $config['file_name'] = $this->input->post('nama_layanan'); //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/layanan/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 5000;
                    $config['new_image'] = './assets/foto/layanan/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];
                    $nama_layanan = $this->input->post('nama_layanan');
                    $keterangan = $this->input->post('keterangan');
                    $icon = $this->input->post('icon');
                    $data = array(
                        'foto' => $file,
                        'icon' => $icon,
                        'keterangan' => $keterangan,
                        'nama_layanan' => $nama_layanan,
                    );
                    $this->M_Layanan->tambah('layanan', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('admin/layanan/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Gagal Tambah Data');
                    redirect('admin/layanan/index', 'refresh');
                }
            } else {
                $nama_layanan = $this->input->post('nama_layanan');
                $keterangan = $this->input->post('keterangan');
                $icon = $this->input->post('icon');

                $data = array(
                    'icon' => $icon,
                    'keterangan' => $keterangan,
                    'nama_layanan' => $nama_layanan,
                );
                $this->M_Layanan->tambah('layanan', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('admin/layanan/index', 'refresh');
            }
        }
    }
    public function edit()
    {
        $id_layanan = $this->uri->segment(4, 0);
        $data['index'] = $this->M_Layanan->index();
        $data['index2'] = $this->M_Layanan->get($id_layanan);
        $data['layanan'] = $this->db->get_where('layanan', array('id_layanan' => $id_layanan))->row_array();

        if ($data) {
            $data['title'] = "Edit data layanan";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/layanan/lihat', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/album/index', 'refresh');
        }
    }
    public function hapus($id_layanan)
    {
        $data =
            $this->db->get_where('layanan', array('id_layanan' => $id_layanan))->row_array();
        if ($data) {
            $this->M_Layanan->hapus($id_layanan);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/layanan/index', 'refresh');
        }
    }

    function ubah()
    {
        $config['upload_path'] = './assets/foto/layanan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa sesuaikan
        $config['file_name'] = $this->input->post('nama_layanan'); //nama yang terupload nantinya
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/layanan/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 5000;
                $config['new_image'] = './assets/foto/layanan/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $nama_layanan = $this->input->post('nama_layanan');
                $id_layanan = $this->input->post('id_layanan');
                $keterangan = $this->input->post('keterangan');
                $icon = $this->input->post('icon');
                $data = array(
                    'foto' => $file,
                    'icon' => $icon,
                    'keterangan' => $keterangan,
                    'nama_layanan' => $nama_layanan,
                );
                $this->M_Layanan->update('layanan', $data, array('id_layanan' => $id_layanan));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/layanan/index', 'refresh');
            }
        } else {
            $nama_layanan = $this->input->post('nama_layanan');
            $keterangan = $this->input->post('keterangan');
            $icon = $this->input->post('icon');
            $id_layanan = $this->input->post('id_layanan');
            $data = array(
                'icon' => $icon,
                'keterangan' => $keterangan,
                'nama_layanan' => $nama_layanan,
            );
            $this->M_Layanan->update('layanan', $data, array('id_layanan' => $id_layanan));
            $this->session->set_flashdata('success', 'Berhasil ubah data');
            redirect('admin/layanan/index', 'refresh');
        }
        $this->session->set_flashdata('success', 'Berhasil tambah data');
        redirect('admin/layanan/index', 'refresh');
    }
}