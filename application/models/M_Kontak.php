<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kontak extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pesan')
            ->order_by('id_pesan', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($id_pesan)
    {
        $query = $this->db->select('*')
            ->from('pesan')
            ->where('pesan.id_pesan', $id_pesan)
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
    public function hapus($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $this->db->delete('pesan');
    }
}