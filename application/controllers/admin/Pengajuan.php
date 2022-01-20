<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Mobil');
        $this->load->model('M_Akun');
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
        $data['title'] = "Index Mobil";
        $data['index'] = $this->M_Akun->mobil();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/pengajuan/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    function tambah()
    {

        $this->form_validation->set_rules('tipe', 'tipe', 'required|trim', [
            'required' => 'Tipe Mobil Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Jenis Mobil Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('warna', 'warna', 'required|trim', [
            'required' => 'Warna Mobil Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jumlah_kursi', 'jumlah_kursi', 'required|trim', [
            'required' => 'Jumlah Kursi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('transmisi', 'transmisi', 'required|trim', [
            'required' => 'Jenis Transmisi Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sewa', 'sewa', 'required|trim', [
            'required' => 'Biaya Sewa Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['thumbnail']['name'])) {
            $this->form_validation->set_rules('thumbnail', 'thumbnail', 'required|trim', [
                'required' => 'Foto Mobil Tidak Boleh Kosong!'
            ]);
        }
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah data mobil";
            $data['profil'] = $this->M_Profil->index();

            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();

            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pengajuan/tambah', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/mobil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('id_pemilik');
            $this->upload->initialize($config);
            if (!empty($_FILES['thumbnail']['name'])) {
                if ($this->upload->do_upload('thumbnail')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 3024;
                    $config['new_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $id_pemilik = $this->session->userdata('id_pengguna');
                    $tipe = $this->input->post('tipe');
                    $jenis = $this->input->post('jenis');
                    $warna = $this->input->post('warna');
                    $jumlah_kursi = $this->input->post('jumlah_kursi');
                    $transmisi = $this->input->post('transmisi');
                    $sewa = $this->input->post('sewa');
                    $tarif = $this->input->post('tarif');
                    $diskon = $this->input->post('tanggal_lahir');

                    $info = $this->input->post('info');
                    $daftar = date('Y-m-d');
                    $data = array(
                        'thumbnail' => $file,
                        'id_pemilik' => $id_pemilik,
                        'tipe' => $tipe,
                        'warna' => $warna,
                        'jumlah_kursi' => $jumlah_kursi,
                        'jenis' => $jenis,
                        'transmisi' => $transmisi,
                        'sewa' => $sewa,
                        'tarif' => $tarif,
                        'diskon' => $diskon,
                        'status' => 'pengajuan',
                        'info' => $info,
                        'daftar' => $daftar,
                    );
                    $this->M_Mobil->tambah('mobil', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('admin/pengajuan/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('admin/pengajuan/index', 'refresh');
                }
            } else {

                $this->session->set_flashdata('success', 'Foto tidak boleh kosong');
                redirect('admin/pengajuan/index', 'refresh');
            }
        }
    }
    public function edit()
    {
        $data['profil'] = $this->M_Profil->index();

        $id_mobil = $this->uri->segment(4, 0);
        $data['index'] = $this->M_Mobil->index();
        $data['index2'] = $this->M_Mobil->get($id_mobil);
        $data['berkas'] = $this->db->get_where('berkas', array('id_pemilik' => $id_mobil))->result_array();
        $data['mobil'] = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->result_array();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        if ($data) {
            $data['title'] = "Edit data mobil";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/pengajuan/lihat', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/pengajuan/index', 'refresh');
        }
    }
    public function hapus($id_mobil)
    {
        $this->M_Mobil->hapus($id_mobil);
        $this->session->set_flashdata('info', 'Berhasil Hapus Data');
        redirect('admin/pengajuan/index', 'refresh');
    }
    function ubah()
    {
        $config['upload_path'] = './assets/foto/mobil/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['file_name'] = $this->input->post('id_mobil');
        if (!empty($_FILES['thumbnail']['name'])) {
            if ($this->upload->do_upload('thumbnail')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 1024;
                $config['new_image'] = './assets/foto/mobil/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $id_pemilik = $this->input->post('id_pemilik');
                $id_mobil = $this->input->post('id_mobil');
                $tipe = $this->input->post('tipe');
                $jenis = $this->input->post('jenis');
                $warna = $this->input->post('warna');
                $jumlah_kursi = $this->input->post('jumlah_kursi');
                $transmisi = $this->input->post('transmisi');

                $sewa = $this->input->post('sewa');
                $tarif = $this->input->post('tarif');
                $diskon = $this->input->post('diskon');

                $data = array(
                    'thumbnail' => $file,
                    'id_pemilik' => $id_pemilik,
                    'tipe' => $tipe,
                    'jenis' => $jenis,
                    'warna' => $warna,
                    'jumlah_kursi' => $jumlah_kursi,
                    'transmisi' => $transmisi,
                    'sewa' => $sewa,
                    'tarif' => $tarif,
                    'diskon' => $diskon,
                    'tarif' => $tarif,
                );
                $this->M_Mobil->update('mobil', $data, array('id_mobil' => $id_mobil));
                $this->session->set_flashdata('success', 'Berhasil update data');
                redirect('admin/pengajuan/index', 'refresh');
            } else {
                $this->session->set_flashdata('info', 'Gagal update data');
                redirect('admin/pengajuan/index', 'refresh');
            }
        } else {

            $this->session->set_flashdata('success', 'Foto tidak boleh kosong');
            redirect('admin/pengajuan/index', 'refresh');
        }
    }
}