<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mobil extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('mobil')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->order_by('id_mobil', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function katalog()
    {
        $query = $this->db->select('*')
            ->from('mobil')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->where('mobil.status', 'tersedia')
            ->order_by('id_mobil', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pengunjung($limit, $start)
    {
        $query = $this->db->select('*')

            ->where('mobil.status', 'tersedia')
            ->order_by('id_mobil', 'DESC') //urut berdasarkan id
            ->get('mobil', $limit, $start)
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pengajuan()
    {
        $query = $this->db->select('*, mobil.id_mobil')
            ->from('mobil')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->where('mobil.status', 'pengajuan')
            ->order_by('mobil.id_mobil', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_mobil)
    {
        $query = $this->db->select('*')
            ->from('mobil')
            ->join('pengguna', 'mobil.id_pemilik=pengguna.id_pengguna')
            ->where('id_mobil', $id_mobil)
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
    public function hapusberkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('berkas');
    }
    public function hapusgaleri($id_galeri)
    {
        $this->db->where('id_galeri', $id_galeri);
        $this->db->delete('galeri');
    }
    public function hapus($id_mobil)
    {
        $this->db->where('id_mobil', $id_mobil);
        $this->db->delete('mobil');
    }
}