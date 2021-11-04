<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Berita');
        $this->load->model('M_History');
        $this->load->model('M_Profil');
        $this->load->model('M_Akun');
    }
    function pengajuan()
    {
        $id_user = $this->session->userdata('id_pengguna');
        $data = array('id_akses' => 6);
        $this->M_Akun->update('pengguna', $data, array('id_pengguna' => $id_user));
        $this->session->set_flashdata('success', 'Tunggu konfirmasi dan cek email anda');
        redirect($_SERVER['HTTP_REFERER']);
    }
    function history()
    {
        $data['berita'] = $this->M_Berita->index();
        $data['kontak'] = $this->M_Profil->index();
        $data['title'] = "History Penyewaan";
        $data['index'] = $this->M_History->customer();
        $this->load->view('pengunjung/template/header', $data);
        $this->load->view('pengunjung/akun/index', $data);
        $this->load->view('pengunjung/template/footer', $data);
    }

    public function hapus($id_transaksi)
    {
        $this->M_History->hapus($id_transaksi);
        $this->session->set_flashdata('success', 'Berhasil Hapus Data');
        redirect('admin/history/index', 'refresh');
    }
}