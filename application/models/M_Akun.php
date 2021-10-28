<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Akun extends CI_Model
{


    public function get($ip, $tanggal)
    {
        $query = $this->db->select('*')
            ->from('pengunjung')
            ->where('ip', $ip)
            ->where('tanggal', $tanggal)
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

    public function hapusmobil($id_mobil)
    {
        $this->db->where('id_mobil', $id_mobil);
        $this->db->delete('mobil');
    }
    public function mobil()
    {
        $query = $this->db->select('*')
            ->from('mobil')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->where('mobil.id_pemilik', $this->session->userdata('id_pengguna'))
            ->order_by('id_mobil', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}