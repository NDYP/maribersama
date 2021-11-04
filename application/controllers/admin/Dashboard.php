<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        login();
        $this->load->model('M_Transaksi');
        $this->load->model('M_Dashboard');
        $this->load->model('M_Kontak');
    }
    function index()
    {
        $data['title'] = "Dashboard Admin";
        $data['index'] = $this->M_Transaksi->index();
        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['jumlah_partner'] = $this->db->get_where('pengguna', array('id_akses' => 4))->num_rows();
        $data['jumlah_customer'] = $this->db->get_where('pengguna', array('id_akses' => 3))->num_rows();
        $data['jumlah_mobil'] = $this->db->get_where('mobil', array('status' => 'tersedia'))->num_rows();
        $data['jumlah_transaksi'] = $this->db->get_where('transaksi', array('status' => 'selesai'))->num_rows();

        $data['pengunjung_total'] = $this->M_Dashboard->total();
        $data['pengunjung_hari_ini'] = $this->M_Dashboard->hari_ini();
        $data['pengunjung_online'] = $this->M_Dashboard->online();

        $data['index'] = $this->M_Transaksi->hari_ini();

        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();

        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    function terima($id_transaksi)
    {
        $data = array('status' => 'disewa');
        $this->M_Transaksi->update('transaksi', $data, array('id_transaksi' => $id_transaksi));
        $this->_sendmail1($id_transaksi);
        $this->session->set_flashdata('success', 'Segera Hubungi Customer');
        redirect($_SERVER['HTTP_REFERER']);
    }
    function selesai($id_transaksi)
    {
        $data = array('status' => 'selesai');
        $this->M_Transaksi->update('transaksi', $data, array('id_transaksi' => $id_transaksi));
        $this->_sendmail2($id_transaksi);
        $this->session->set_flashdata('success', 'Transaksi Selesai');
        redirect($_SERVER['HTTP_REFERER']);
    }
    private function _sendmail1($id_transaksi)
    {
        //$customer = $this->session->userdata('id_pengguna');
        $user = $this->M_Transaksi->gettransaksi($id_transaksi);

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '59b2958d9247bd',
            'smtp_pass' => '20abef486bad12',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from('rental_maribersaudara@gmail.com');
        $this->email->to($user['email']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Selamat anda telah diterima menjadi martner dari Mari Bersaudara Rent, segera ajukan mobil yang ingin disewakan.');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    private function _sendmail2($id_transaksi)
    {
        $customer = $this->session->userdata('id_pengguna');
        $user = $this->M_Transaksi->gettransaksi($id_transaksi);

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '59b2958d9247bd',
            'smtp_pass' => '20abef486bad12',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from('rental_maribersaudara@gmail.com');
        $this->email->to($user['email']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Selamat anda telah diterima menjadi martner dari Mari Bersaudara Rent, segera ajukan mobil yang ingin disewakan.');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}