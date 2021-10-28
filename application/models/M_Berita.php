<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berita extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('berita')

            ->order_by('id_berita', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($id_berita)
    {
        $query = $this->db->select('*')
            ->from('berita')

            ->where('berita.id_berita', $id_berita)
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
    public function hapus($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('berita');
    }
}
