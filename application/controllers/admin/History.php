<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('M_Akun');
        $this->load->model('M_Mobil');
        $this->load->model('M_History');
        $this->load->model('M_Customer');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['title'] = "History Penyewaan";
        $data['index'] = $this->M_History->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/history/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
}