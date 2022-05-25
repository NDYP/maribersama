<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        login();
        akses();
        $this->load->model('M_Transaksi');
        $this->load->model('M_Dashboard');
        $this->load->model('M_Kontak');
        $this->load->model('M_Profil');
        $this->load->model('M_Profil');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['title'] = "Dashboard";
        $data['title2'] = "Administrator";
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
    function approve($id_transaksi)
    {
        $data = array('status' => 'settlement');
        $status = array('status' => 'Sedang disewa');
        $mobil = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->row_array();
        // $mobil['id_mobil'];
        // var_dump($mobil['id_mobil']);
        $this->M_Transaksi->update('mobil', $status, array('id_mobil' => $mobil['id_mobil']));
        $this->M_Transaksi->update('transaksi', $data, array('id_transaksi' => $id_transaksi));
        $this->_sendmail1($id_transaksi);
        $this->session->set_flashdata('success', 'Segera Hubungi Customer');
        redirect($_SERVER['HTTP_REFERER']);
    }
    function selesai($id_transaksi)
    {
        $this->form_validation->set_rules('denda', 'denda', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['profil'] = $this->M_Profil->index();

            $data['title'] = "Transaksi";
            $data['title2'] = "Selesai";
            $data['transaksi'] = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->row_array();

            $tanggal_lewat = date('Y-m-d');
            $tanggal_kembali = date('Y-m-d', strtotime($data['transaksi']['tanggal_kembali']));
            $hari = strtotime($tanggal_lewat) - strtotime($tanggal_kembali);
            $jml_hari_lewat = ceil(abs($hari / 86400));
            $id_mobil = $data['transaksi']['id_mobil'];
            $x = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
            $tarif = $x['tarif'];
            $data['denda'] = $jml_hari_lewat * $tarif;


            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/dashboard/selesai', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $id_transaksi = $this->input->post('id_transaksi');
            // $id_mobil = $this->input->post('id_mobil');
            $y = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi))->row_array();
            $id_mobil = $y['id_mobil'];

            $x = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
            $tarif = $x['tarif'];
            $bagian_rental = $x['bagian_rental'];

            $bayar = $y['bayar'];
            $tanggal_pinjam = $y['tanggal_pinjam'];
            $tanggal_kembali = $y['tanggal_kembali'];
            $tanggal_pinjam =
                date('Y-m-d', strtotime($tanggal_pinjam));
            $tanggal_kembali =
                date('Y-m-d', strtotime($tanggal_kembali));
            $diff = strtotime($tanggal_pinjam) - strtotime($tanggal_kembali);
            $berapa_hari = ceil(abs($diff / 86400));


            $denda = $this->input->post('denda');
            // $kurang = ($bayar  + $denda) - $bagian_rental;
            $data = array(
                'status' => 'selesai',
                'denda' => $denda,
                'bayar' => ($bayar  + $denda),
                'sewa' => $bagian_rental * $berapa_hari
            );

            $status = array('status' => 'Tersedia');
            $this->M_Transaksi->update('transaksi', $data, array('id_transaksi' => $id_transaksi));
            $this->M_Transaksi->update('mobil', $status, array('id_mobil' => $id_mobil));
            $this->_sendmail2($id_transaksi);
            $this->session->set_flashdata('success', 'Transaksi Selesai');
            redirect('admin/transaksi/index');
            // var_dump($bagian_rental);
        }
    }
    private function _sendmail1($id_transaksi)
    {
        //$customer = $this->session->userdata('id_pengguna');
        $user = $this->M_Transaksi->gettransaksi($id_transaksi);

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => '43111cc6037b8d',
            'smtp_pass' => '8b752bd5412080',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->email->from('rental_maribersaudara@gmail.com');
        $this->email->to($user['email']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Penyewaan telah diterima.');
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
        $this->email->to($user['email_pengguna']);
        $this->email->subject('Pengajuan Partner | Rental Mari Bersaudara');
        $this->email->message('Penyewaan ditolak.');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function lihat($id_transaksi)
    {
        $data['profil'] = $this->M_Profil->index();

        $data['transaksi'] = $this->M_Transaksi->gettransaksi($id_transaksi);
        if ($data) {
            $data['title'] = "Penyewaan";
            $data['title2'] = "Detail Data";
            $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
            $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
            $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
            $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/dashboard/detail', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/dashboard/index', 'refresh');
        }
    }
}