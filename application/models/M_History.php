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
}