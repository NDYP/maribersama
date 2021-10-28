<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Customer extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pengguna')
            ->where('id_akses', 3)
            ->order_by('id_pengguna', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_pengguna)
    {
        $query = $this->db->select('*')
            ->from('user')
            ->join('pejabat_desa', 'pejabat_desa.id_pejabat=user.id_pejabat', 'left')
            ->join('penduduk', 'penduduk.nik_penduduk=pejabat_desa.nik', 'left')
            ->where('akses', 'partner')
            ->where('user.id_pengguna', $id_pengguna)
            ->order_by('id_pengguna', 'ASC')
            ->get()
            ->row_array();
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
    public function hapusberkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('berkas');
    }
}
