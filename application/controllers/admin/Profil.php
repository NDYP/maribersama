<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['title'] = "Index Profil";
        $data['index'] = $this->M_Profil->index();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/profil/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function edit()
    {
        $id_profil = $this->uri->segment(4, 0);
        $data['profil'] = $this->db->get_where('profil', array('id_profil' => $id_profil))->row_array();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        if ($data) {
            $data['title'] = "Edit profil rental";
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/profil/detail', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/profil/index', 'refresh');
        }
    }
    public function editvisi()
    {
        $id_profil = $this->uri->segment(4, 0);
        $data['profil'] = $this->db->get_where('profil', array('id_profil' => $id_profil))->row_array();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        if ($data) {
            $data['title'] = "Edit profil rental";
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/profil/visi', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/profil/index', 'refresh');
        }
    }
    public function editmisi()
    {
        $id_profil = $this->uri->segment(4, 0);
        $data['profil'] = $this->db->get_where('profil', array('id_profil' => $id_profil))->row_array();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        if ($data) {
            $data['title'] = "Edit profil rental";
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/profil/misi', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/profil/index', 'refresh');
        }
    }
    function ubah()
    {
        $config['upload_path'] = './assets/foto/profil/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] = $this->input->post('id_profil');
        $this->upload->initialize($config);
        if (!empty($_FILES['logo']['name'])) {
            if ($this->upload->do_upload('logo')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/profil/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/profil/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $id_profil = $this->input->post('id_profil');
                $alamat = $this->input->post('alamat');
                $nama_rental = $this->input->post('nama_rental');
                $email = $this->input->post('email');
                $alamat = $this->input->post('alamat');
                $lokasi = $this->input->post('lokasi');

                $sejarah = $this->input->post('sejarah');

                $data = array(
                    'logo' => $file,
                    'alamat' => $alamat,
                    'nama_rental' => $nama_rental,
                    'alamat' => $alamat,
                    'lokasi' => $lokasi,
                    'email' => $email,

                    'sejarah' => $sejarah,
                );
                $this->M_Profil->update('profil', $data, array('id_profil' => $id_profil));
                $this->session->set_flashdata('success', 'Berhasil ubah data');
                redirect('admin/profil/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal ubah data');
                redirect('admin/profil/index', 'refresh');
            }
        } else {
            $id_profil = $this->input->post('id_profil');
            $alamat = $this->input->post('alamat');
            $nama_rental = $this->input->post('nama_rental');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $lokasi = $this->input->post('lokasi');

            $sejarah = $this->input->post('sejarah');

            $data = array(
                'alamat' => $alamat,
                'nama_rental' => $nama_rental,
                'alamat' => $alamat,
                'lokasi' => $lokasi,
                'email' => $email,

                'sejarah' => $sejarah,
            );
            $this->M_Profil->update('Profil', $data, array('id_profil' => $id_profil));
            $this->session->set_flashdata('success', 'Berhasil ubah data');
            redirect('admin/profil/index', 'refresh');
        }
    }

    function visi()
    {

        $visi = $this->input->post('visi');

        $id_profil = $this->input->post('id_profil');
        $data = array(

            'visi' => $visi,

        );
        $this->M_Profil->update('profil', $data, array('id_profil' => $id_profil));
        $this->session->set_flashdata('success', 'Berhasil ubah data');
        redirect('admin/profil/index', 'refresh');
    }
    function misi()
    {
        $misi = $this->input->post('misi');

        $id_profil = $this->input->post('id_profil');
        $data = array(

            'misi' => $misi,

        );
        $this->M_Profil->update('profil', $data, array('id_profil' => $id_profil));
        $this->session->set_flashdata('success', 'Berhasil ubah data');
        redirect('admin/profil/index', 'refresh');
    }
}