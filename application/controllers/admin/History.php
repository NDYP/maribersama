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
        $this->load->model('M_Profil');
        $this->load->model('M_Kontak');
        $this->load->model('M_Transaksi');
    }
    function index()
    {
        $data['profil'] = $this->M_Profil->index();

        $data['pengajuan_partner'] = $this->db->get_where('pengguna', array('id_akses' => 6))->num_rows();
        $data['pengajuan_mobil'] = $this->db->get_where('mobil', array('status' => 'pengajuan'))->num_rows();
        $data['pesan'] = $this->db->get_where('pesan', array('status' => 'unread'))->num_rows();
        $data['pesan_index'] = $this->db->get_where('pesan', array('status' => 'unread'))->result_array();
        $data['title'] = "Penyewaan";
        $data['title2'] = "Index Data";
        $data['index'] = $this->M_History->index();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/history/index', $data);
        $this->load->view('admin/template/footer', $data);
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
            $this->load->view('admin/history/detail', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            $this->session->set_flashdata('Info', 'Tidak Ada Data');
            redirect('admin/hostory/index', 'refresh');
        }
    }
    public function ubah()
    {
        $id_transaksi
            = $this->input->post('id_transaksi');
        $id_mobil = $this->input->post('id_mobil');
        $x = $this->db->get_where('mobil', array('id_mobil' => $id_mobil))->row_array();
        $tarif = $x['tarif'];
        $diskon = $x['diskon'];

        $id_penyewa = $this->input->post('id_penyewa');
        $alamat = $this->input->post('alamat');

        $opsi = $this->input->post('opsi');
        $tanggal_pinjam =
            date('Y-m-d', strtotime($this->input->post('tanggal_pinjam')));
        $tanggal_kembali =
            date('Y-m-d', strtotime($this->input->post('tanggal_kembali')));
        $diff = strtotime($tanggal_pinjam) - strtotime($tanggal_kembali);
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
        $berapa_hari = ceil(abs($diff / 86400));
        $tanggal_transaksi = date('Y-m-d');
        $dp = $this->input->post('dp');

        $jl_tarif = $tarif - (($tarif * $diskon) / 100);



        //$denda = $this->input->post('denda');
        $tanggal_lewat = date('Y-m-d');
        $tanggal_kembali = date('Y-m-d', strtotime($this->input->post('tanggal_kembali')));
        $hari = strtotime($tanggal_lewat) - strtotime($tanggal_kembali);
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
        $jml_hari_lewat = ceil(abs($hari / 86400));
        $jl_denda = $tarif - (($tarif * $diskon) / 100);
        $denda = $jml_hari_lewat * $jl_denda;


        $data = array(
            'id_penyewa' => $id_penyewa,
            'id_mobil' => $id_mobil,
            'alamat' => $alamat,
            'status' => 'pengajuan',
            'opsi' => $opsi,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'tanggal_transaksi' => $tanggal_transaksi,
            'dp' => $dp,
            'denda' => $denda,
            'bayar' => ($jl_tarif * $berapa_hari  + $denda) - $dp,
        );
        $this->M_Transaksi->update('transaksi', $data, array('id_transaksi' => $id_transaksi));
        $this->session->set_flashdata('success', 'Transaksi Baru Ditambahkan');
        redirect('admin/history/index');
    }
    public function hapus($id_transaksi)
    {
        $this->M_History->hapus($id_transaksi);
        $this->session->set_flashdata('success', 'Berhasil Hapus Data');
        redirect('admin/history/index', 'refresh');
    }
    public function cetak()
    {
        $data['profil'] = $this->M_Profil->index();
        $bulan1 = $this->input->post('awal');
        $bulan2 = $this->input->post('akhir');

        $data['pemasukan_transaksi'] = $this->M_History->cetak($bulan1, $bulan2)->result_array();
        $data['pemasukan_total'] = $this->M_History->total_keluar($bulan1, $bulan2)->result_array();
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan Akhir Bulan.pdf";
        $this->pdf->load_view('admin/history/laporan', $data);
    }
}