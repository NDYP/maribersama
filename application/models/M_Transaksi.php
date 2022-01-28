<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function gettransaksi($id_transaksi)
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat, pengguna.email as email_pengguna')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where('id_transaksi', $id_transaksi)
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->row_array();
        return $query;
    }
    public function hari_ini()
    {
        $date = date('Y-m-d');
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            // ->where('transaksi.tanggal_transaksi', $date)
            // ->where('transaksi.status', 'pengajuan')
            // ->or_where('transaksi.tanggal_kembali', $date)
            // ->where('transaksi.status', 'disewa')
            ->order_by('id_transaksi', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($id_admin)
    {
        $query = $this->db->select('*')
            ->from('admin')
            ->where('id_admin', $id_admin)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
    }
    function cetak($bulan1, $bulan2)
    {
        $query = $this->db->select('*, transaksi.status as status_transaksi, transaksi.alamat as transaksi_alamat')
            ->from('transaksi')
            ->join('mobil', 'transaksi.id_mobil=mobil.id_mobil', 'left')
            ->join('pengguna', 'transaksi.id_penyewa=pengguna.id_pengguna', 'left')
            ->where("tanggal_transaksi BETWEEN '$bulan1' AND '$bulan2'")
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
            ->get();
        return $query;
    }
}