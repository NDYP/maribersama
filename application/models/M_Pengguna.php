<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengguna extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pengguna')

            ->order_by('id_pengguna', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function indexkaryawan()
    {
        $query = $this->db->select('*')
            ->from('pengguna')
            ->where('id_akses', 5)
            ->order_by('id_pengguna', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_pengguna)
    {
        $query = $this->db->select('*')
            ->from('pengguna')
            ->where('pengguna.id_pengguna', $id_pengguna)
            ->order_by('id_pengguna', 'ASC') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function auth($username)
    {
        $query = $this->db->select('*')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->where('user.username', $username)
            ->order_by('id_pengguna', 'ASC') //urut berdasarkan id
            ->get();

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
    public function hapus($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->delete('pengguna');
    }
    public function hapusgaji($id_karyawan_gaji)
    {
        $this->db->where('id_karyawan_gaji', $id_karyawan_gaji);
        $this->db->delete('karyawan_gaji');
    }
    public function hapusberkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('berkas');
    }
    function cetak($bulan1, $bulan2)
    {
        $tanggal = date('Y-m-d');
        $query = $this->db->select('*')
            ->from('pengguna')
            ->join('karyawan_gaji', 'pengguna.id_pengguna=karyawan_gaji.id_pengguna', 'left')
            ->where('id_akses', 5)
            ->where("karyawan_gaji.bulan BETWEEN '$bulan1' AND '$bulan2'")
            ->order_by('pengguna.id_pengguna', 'ASC')
            ->get();
        return $query;
    }
    function total_keluar($bulan1, $bulan2)
    {
        $tanggal = date('Y-m-d');
        $query = $this->db->select('SUM(gaji) as x')
            ->from('pengguna')
            ->join('karyawan_gaji', 'pengguna.id_pengguna=karyawan_gaji.id_pengguna', 'left')
            ->where('id_akses', 5)
            ->where("karyawan_gaji.bulan BETWEEN '$bulan1' AND '$bulan2'")
            ->order_by('pengguna.id_pengguna', 'ASC')
            ->get();
        return $query;
    }
}