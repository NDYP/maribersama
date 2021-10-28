<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Galeri extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('album')

            ->order_by('id_album', 'DESC')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($id_album)
    {
        $query = $this->db->select('*')
            ->from('album')

            ->where('album.id_album', $id_album)
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
    public function hapus($id_album)
    {
        $this->db->where('id_album', $id_album);
        $this->db->delete('album');
    }
    public function hapusgaleri($id_galeri)
    {
        $this->db->where('id_galeri', $id_galeri);
        $this->db->delete('galeri');
    }
}
