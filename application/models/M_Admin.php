<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('admin')
            ->join('pengguna', 'admin.id_pengguna=pengguna.id_pengguna', 'left')
            ->order_by('id_admin', 'DESC') //urut berdasarkan id
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
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
    public function cek_login($username)
    {
        $query = $this->db->select('*, admin.username as username_admin, admin.password as password_admin ')
            ->from('admin')
            ->join('pengguna', 'admin.id_pengguna=pengguna.id_pengguna', 'left')
            ->where('admin.username', $username)
            ->get();
        return $query;
    }
    public function login_pengunjung($username)
    {
        $query = $this->db->select('*')
            ->from('pengguna')
            ->where('pengguna.username', $username)
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
    public function hapus($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
    }
    public function hapusberkas($id_berkas)
    {
        $this->db->where('id_berkas', $id_berkas);
        $this->db->delete('berkas');
    }
}