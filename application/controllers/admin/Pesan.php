<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kontak');
        login();
    }
    function index()
    {
        $data['title'] = 'Kelola pesan';
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->M_Kontak->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/pesan/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function read($id_pesan)
    {
        $data = array(
            'status' => 'read',
        );
        $this->M_Kontak->update('pesan', $data, array('id_pesan' => $id_pesan));
        $this->session->set_flashdata('success', 'pesan Aktif');
        redirect('admin/pesan/index', 'refresh');
    }
    function unread($id_pesan)
    {
        $data = array(
            'status' => 'unread',
        );
        $this->M_Kontak->update('pesan', $data, array('id_pesan' => $id_pesan));
        $this->session->set_flashdata('success', 'pesan Nonaktif');
        redirect('admin/pesan/index', 'refresh');
    }


    public function hapus($id_pesan)
    {
        $data =
            $this->db->get_where('pesan', array('id_pesan' => $id_pesan))->row_array();
        if ($data) {
            $this->M_Kontak->hapus($id_pesan);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect('admin/pesan/index', 'refresh');
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/pesan/index', 'refresh');
        }
    }
}