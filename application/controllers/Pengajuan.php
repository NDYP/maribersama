<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita');
        $this->load->model('M_History');
        $this->load->model('M_Profil');
        $this->load->model('M_Akun');
    }
    function index()
    {
        $this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['ktp']['name'])) {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim', [
                'required' => 'Tidak Boleh Kosong!'
            ]);
        }
        if ($this->form_validation->run() == FALSE) {
            $data['kontak'] = $this->M_Profil->index();
            $this->load->view('pengunjung/template/header', $data);
            $this->load->view('pengunjung/pengajuan/index', $data);
            $this->load->view('pengunjung/template/footer', $data);
        } else {
            $config['upload_path']          = './assets/foto/ktp/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 3000;
            $config['file_name'] = $this->session->userdata('id_pengguna');

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('ktp')) {
                echo $this->upload->display_errors();
            } else {
                $id_user = $this->session->userdata('id_pengguna');
                $gbr = $this->upload->data();
                $file = $gbr['file_name'];
                $data = array(
                    'id_akses' => 6,
                    'ktp' => $file
                );
                $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_user));
                $this->session->set_flashdata('success', 'Tunggu konfirmasi dan cek email anda');
                redirect('pengajuan/index');
            }
        }
    }
    function req()
    {
        $config['upload_path']          = './assets/foto/ktp/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 3000;
        $config['file_name'] = $this->session->userdata('id_pengguna');

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ktp')) {
            $this->session->set_flashdata('error', 'File terlalu besar');
        } else {
            $id_user = $this->session->userdata('id_pengguna');
            $gbr = $this->upload->data();
            $file = $gbr['file_name'];
            $data = array(
                'id_akses' => 6,
                'ktp' => $file
            );
            $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_user));
            $this->session->set_flashdata('success', 'Tunggu konfirmasi dan cek email anda');
            redirect('pengajuan/index');
        }
    }
}