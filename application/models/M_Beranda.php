<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Beranda extends CI_Model
{
    public function berita()
    {
        $query = $this->db->select('*')
            ->order_by('id_berita', 'DESC')
            ->get('berita', 3, NULL)
            ->result_array();
        return $query;
    }

    public function layanan()
    {
        $query = $this->db->select('*')
            ->from('layanan')
            ->order_by('id_layanan', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function mobil()
    {
        $query = $this->db->select('*')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->order_by('id_mobil', 'DESC') //urut berdasarkan id
            ->get('mobil', 4, NULL)
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function karyawan()
    {
        $query = $this->db->select('*')
            ->from('pengguna')
            ->where('id_akses', 5)
            ->order_by('id_pengguna', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}