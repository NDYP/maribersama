<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_History extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where('mobil.id_pemilik', $this->session->userdata('id_pengguna'))
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    function cetak($bulan1, $bulan2)
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where("tanggal_transaksi BETWEEN '$bulan1' AND '$bulan2'")
            ->where('mobil.id_pemilik', $this->session->userdata('id_pengguna'))
            ->order_by('id_transaksi', 'ASC')
            ->get();
        return $query;
    }
    function total_keluar($bulan1, $bulan2)
    {
        $query = $this->db->select('SUM(bayar) as x')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where("tanggal_transaksi BETWEEN '$bulan1' AND '$bulan2'")
            ->where('mobil.id_pemilik', $this->session->userdata('id_pengguna'))
            ->get();
        return $query;
    }
    public function customer()
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where('transaksi.id_penyewa', $this->session->userdata('id_pengguna'))
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function hapus($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
    }
    public function laporan($tanggal1, $tanggal2)
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where('mobil.id_pemilik', $this->session->userdata('id_pengguna'))
            ->where("tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'")
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
}